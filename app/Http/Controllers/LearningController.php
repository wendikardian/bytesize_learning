<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Content;
use App\Models\Course;
use App\Models\DetailLearning;
use App\Models\DetailQuizTaken;
use App\Models\EvaluationTaken;
use App\Models\Learning;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizTaken;
use App\Models\SubCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function join(Request $request)
    {
        $courseId = $request->input('id');
        $data = [
            "course_id" => $courseId,
            "user_id" => Auth::user()->id
        ];

        $learning = Learning::create($data);
        $learningId = $learning->id;
        foreach (Content::where('course_id', $courseId)->pluck('id') as $contentId) {
            $detail = DetailLearning::create(["learning_id" => $learningId, "content_id" => $contentId]);
            $content = Content::find($contentId);
            if ($content->tipe_content == 2) {
                $quiz = $content->quiz;
                $quiz_taken = QuizTaken::create(
                    [
                        "quiz_id" => $quiz->id,
                        "detail_learning_id" => $detail->id
                    ]
                );
                foreach (Question::where('quiz_id', $quiz->id)->pluck('id') as $questionId) {
                    DetailQuizTaken::create([
                        "quiz_taken_id" => $quiz_taken->id,
                        "question_id" => $questionId
                    ]);
                }
            } else if ($content->tipe_content == 3) {
                $eval = $content->evaluation;
                $eval_taken = EvaluationTaken::create(
                    [
                        "evaluation_id" => $eval->id,
                        "detail_learning_id" => $detail->id
                    ]
                );
            }
        }
        return redirect('/summary/' . $learningId);
    }

    public function summary(Learning $learning)
    {
        $total = $learning->detailLearning->count();
        if ($total == 0) {
            return view('course/summary', [
                "title" => $learning->course->judul,
                "page" => "summary",
                "learning" => $learning,
                "course" => Course::find($learning->course_id),
                "sub_course" => Course::find($learning->course_id)->subCourse,
                "content" => Course::find($learning->course_id)->content,
                "progres" => 0,
                "last" => "Kamu belum menyelesaikan satupun materi",
                "status" => 0
            ]);
        }

        $selesai = DetailLearning::where([['status', '1'], ['learning_id', $learning->id]]);
        $progres = ($selesai->count() / $total) * 100;
        $last = $selesai->latest('updated_at');
        $lastMateri = "Kamu belum menyelesaikan satupun materi";
        $status = 0;
        if ($last->count() > 0) {
            $status = 1;
            $lastMateri = Content::find($last->pluck('content_id')->first())->judul;
            if ($selesai->count() == $total) {
                $status = 2;
            }
        }
        return view('course/summary', [
            "title" => $learning->course->judul,
            "page" => "summary",
            "learning" => $learning,
            "course" => Course::find($learning->course_id),
            "sub_course" => Course::find($learning->course_id)->subCourse,
            "content" => Course::find($learning->course_id)->content,
            "progres" => $progres,
            "last" => $lastMateri,
            "status" => $status
        ]);
    }

    public function continue(Request $request)
    {
        $id = null;
        if ($last = DetailLearning::where([['status', '1'], ['learning_id', $request->input('learning_id')]])->latest('updated_at')->pluck('id')->first()) {
            $id = $last;
        } else {
            $id = DetailLearning::where('learning_id', $request->input('learning_id'))->pluck('id')->first();
        }
        return redirect('/content/' . $id);
    }

    public function prev(Request $request)
    {
        $prev = DetailLearning::where([['content_id', $request->input('prev_id')], ['learning_id', $request->input('learning_id')]])->pluck('id')->first();
        return redirect('/content/' . $prev);
    }

    public function next(Request $request)
    {
        $next = DetailLearning::where([['content_id', $request->input('next_id')], ['learning_id', $request->input('learning_id')]])->pluck('id')->first();
        return redirect('/content/' . $next);
    }

    public function content(DetailLearning $detailLearning)
    {
        $detail = DetailLearning::find($detailLearning->id);
        $ld = $detail->learning->detailLearning;
        $content = $detail->content;
        $course = $content->course;
        if ($content->tipe_content == 1) {
            return view('course/material', [
                "title" => $content->judul,
                "page" => "content",
                "content" => $content,
                "material" => $content->material,
                "sub_course" => $course->subCourse,
                "allContent" => $course->content,
                "allDetail" => $ld,
                "detail" => $detail
            ]);
        } else if ($content->tipe_content == 2) {
            $quiz = $content->quiz;
            $quizTaken = QuizTaken::where('detail_learning_id', $detail->id)->first();
            $allQuest = $quizTaken->detailQuizTaken;
            return view('course/quiz', [
                "title" => $content->judul,
                "page" => "content",
                "content" => $content,
                "quiz" => $quiz,
                "sub_course" => $course->subCourse,
                "allContent" => $course->content,
                "allDetail" => $ld,
                "taken" => $quizTaken,
                "allQuestion" => $allQuest,
                "detail" => $detail
            ]);
        } else if ($content->tipe_content == 3) {
            return redirect('/content/' . $detail->id . '/evaluation');
        } else if ($content->tipe_content == 4) {
            return redirect('/content/' . $detail->id . '/certificate');
        }
    }

    public function finish(Request $request)
    {
        $data =  DetailLearning::find($request->input('detail_id'));
        $data->status = 1;
        $data->save();
        $achievement = Auth::user()->achievement;
        $achievement->total_xp += $request->input('xp');
        $achievement->save();
        $this->updateLevel($achievement);
        return redirect('/content/' . $request->input('detail_id'));
    }

    public function certificate(DetailLearning $detailLearning)
    {
        $detail = DetailLearning::find($detailLearning->id);
        $ld = $detail->learning->detailLearning;
        $content = $detail->content;
        $course = $content->course;
        return view('course/certificate', [
            "title" => $content->judul,
            "page" => "content",
            "content" => $content,
            "course" => $course,
            "sub_course" => $course->subCourse,
            "allContent" => $course->content,
            "allDetail" => $ld,
            "detail" => $detail
        ]);
    }
}
