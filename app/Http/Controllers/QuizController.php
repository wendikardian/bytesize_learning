<?php

namespace App\Http\Controllers;

use App\Models\DetailLearning;
use App\Models\DetailQuizTaken;
use App\Models\QuizTaken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Content;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;

class QuizController extends Controller
{
    public function taken(Request $request)
    {
        $data = QuizTaken::find($request->input('quizTakenId'));
        if ($data->status == 0) {
            $data->status = 1;
            $data->save();
        }
        return redirect('/content/quiz/' . $data->id);
    }

    public function index(QuizTaken $quizTaken)
    {
        $qt = QuizTaken::find($quizTaken->id);

        if ($qt->status != 2) {
            $last = DetailQuizTaken::where([['quiz_taken_id', $quizTaken->id], ['status', 1]])->first();
            if ($last) {
                return redirect('/content/quiz/' . $qt->id . '/' . $last->id);
            } else {
                $up = DetailQuizTaken::where([['quiz_taken_id', $quizTaken->id], ['status', 0]])->first();
                if ($up) {
                    return redirect('/content/quiz/' . $qt->id . '/' . $up->id);
                } else {
                    //kemana?
                }
            }
        } else { //sudah selesai
            $first = DetailQuizTaken::where('quiz_taken_id', $qt->id)->first();
            return redirect('/content/quiz/' . $qt->id . '/' . $first->id);
        }
    }

    public function answer(Request $request)
    {
        $data = DetailQuizTaken::find($request->input('detailQuizTakenId'));
        $quizTaken = $data->quizTaken;
        $learning = $quizTaken->detailLearning;

        $data->answer_id = $request->input('user_answer');
        $data->save();
        $question = $data->question;
        foreach ($question->answer as $a) {
            if ($a->status == 1) {
                if ($a->id == $data->answer_id) { //jika jawaban benar
                    $data->status = 1;
                    $data->is_true = true;
                    $data->save();
                    $qt = $data->quizTaken;
                    $qt->total_point += $data->current_point;
                    $qt->save();

                    if (!$question->next_quest) {
                        $data->status = 2;
                        $data->save();
                        $qt->status = 2;
                        $qt->save();
                        $achievement = Auth::user()->achievement;
                        $achievement->total_point += $qt->total_point;
                        $achievement->total_xp += $learning->content->quiz->xp;
                        $achievement->save();
                        $this->updateLevel($achievement);
                        $learning->status = 1;
                        $learning->save();
                    }
                    return back();
                } else {
                    $data->status = 1;
                    $data->current_point -= 1;
                    $data->save();
                    return back();
                }
            }
        }
    }

    public function prev(Request $request)
    {
        $id = $request->input('id');
        $prevId = $request->input('prevQuest');

        $detail = DetailQuizTaken::find($id);
        $quiz_taken = QuizTaken::find($detail->quiz_taken_id);

        if ($prevId) {
            if ($quiz_taken->status == 3) {
                $prev = DetailQuizTaken::where([['question_id', $prevId], ['quiz_taken_id', $quiz_taken->id]])->pluck('id')->first();
                return redirect('/content/quiz/' . $quiz_taken->id . '/' . $prev);
            } else {
                $prev = DetailQuizTaken::where([['question_id', $prevId], ['quiz_taken_id', $quiz_taken->id]])->first();
                if ($prev->status == 2) {
                    return redirect('/content/quiz/' . $quiz_taken->id . '/' . $prev->id);
                }
                return redirect('/content/quiz/' . $detail->quiz_taken_id);
            }
        } else {
            return redirect('/content/' . $request->input('learning_id'));
        }
    }

    public function next(Request $request)
    {
        $id = $request->input('id');
        $nextId = $request->input('nextQuest');

        $detail = DetailQuizTaken::find($id);
        $quiz_taken = QuizTaken::find($detail->quiz_taken_id);

        if ($detail->status == 1) {
            $detail->status = 2;
            $detail->save();
        }

        if ($nextId) {
            if ($quiz_taken->status == 2) {
                $next = DetailQuizTaken::where([['question_id', $nextId], ['quiz_taken_id', $quiz_taken->id]])->pluck('id')->first();
                return redirect('/content/quiz/' . $quiz_taken->id . '/' . $next);
            } else {
                return redirect('/content/quiz/' . $detail->quiz_taken_id);
            }
        } else {
            return redirect('/content/' . $request->input('learning_id'));
        }
    }

    public function quiz(QuizTaken $quizTaken, DetailQuizTaken $detailQuizTaken)
    {

        $detail_taken = DetailQuizTaken::find($detailQuizTaken->id);
        $quiz_taken = QuizTaken::find($quizTaken->id);
        $detail_learning = DetailLearning::find($quiz_taken->detail_learning_id);
        $ld = $detail_learning->learning->detailLearning;
        $content = $detail_learning->content;
        $course = $content->course;

        $count = 1;
        $question = $detail_taken->question;
        $answer = $question->answer;
        $allQuestion = $quiz_taken->detailQuizTaken;

        foreach ($quiz_taken->detailQuizTaken as $check) {
            if ($check->id == $detail_taken->id) {
                break 1;
            }
            $count++;
        }

        return view('course/question', [
            "title" => $content->judul,
            "content" => $content,
            "page" => "content",
            "no" => $count,
            "question" => $question,
            "answers" => $answer,
            "detailQuizTaken" => $detail_taken,
            "sub_course" => $course->subCourse,
            "allContent" => $course->content,
            "allDetail" => $ld,
            "allQuestion" => $allQuestion,
            "detail" => $detail_learning
        ]);
    }

    public function result(DetailLearning $detailLearning, QuizTaken $quizTaken)
    {
        $detail = DetailLearning::find($detailLearning->id);
        $ld = $detail->learning->detailLearning;
        $content = $detail->content;
        $course = $content->course;
        $sub = $content->subCourse;

        $quizTaken = QuizTaken::find($quizTaken->id);
        $allQuestion = $quizTaken->detailQuizTaken;

        return view('course/quiz_result', [
            "title" => $content->judul,
            "page" => "content",
            "content" => $content,
            "sub_course" => $course->subCourse,
            "allContent" => $course->content,
            "allDetail" => $ld,
            "allQuestion" => $allQuestion,
            "taken" => $quizTaken,
            "detail" => $detail,
            "sub" => $sub
        ]);
    }

    public function manageQuizzes(Content $content)
    {
        $quiz = $content->quiz()->first();

        if (!$quiz) {
            $quiz = $content->quiz()->create([
                'desc' => '-',
                'xp' => 10,
            ]);
        }

        // get questions where quiz_id = $quiz->id
        $questions = Question::where('quiz_id', $quiz->id)->get();
        $answer = [];
        foreach ($questions as $question) {
            $question->answers = Answer::where('question_id', $question->id)->get();
            // append that on the last array answer question
            $answer[] = $question->answers;
        }

        

        // var_dump($answer);
        return view('admin.manage_quizzes', [
            'title' => 'Course',
            'content' => $content,
            'quiz' => $quiz,
            'questions' => $questions,
            'answers' => $answer,
        ]);
    }

    public function store(Request $request, Quiz $quiz, $content_id)
    {
        // var_dump($request->all());
        $request->validate([
            'desc' => 'required',
            'xp' => 'required|integer|min:0',
        ]);

        $quiz->desc = $request->input('desc');
        $quiz->xp = $request->input('xp');
        $quiz->content_id = $content_id;
        $quiz->save();

        return redirect()->route('admin.manageQuizzes', ['content' => $content_id])
                 ->with('success', 'Quiz updated successfully.');
    }

    public function upload(Request $request)
    {
        $quiz = new Quiz();
        $quiz->id = 0;
        $quiz->exists = true;

        $image = $quiz->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }

    public function createQuestion(Quiz $quiz)
    {
        return view('admin.create_question', [
            'title' => 'Course',
            'quiz' => $quiz,
        ]);
    }

    public function uploadQuestion(Request $request)
    {
        $question = new Question();
        $question->id = 0;
        $question->exists = true;

        $image = $question->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }

    public function storeQuestion(Request $request, Quiz $quiz)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'options' => 'required|array|min:1',
            // 'correct_answer' => 'required|integer|min:1',
        ]);

        // var_dump($request->all());
        $question = new Question();
        $question->quiz_id = $quiz->id;
        $question->pertanyaan = $request->input('pertanyaan');
        $question->prev_quest = $request->input('prev_id');
        $question->next_quest = $request->input('next_id');
        $question->point = $request->input('point');
        $question->save();

        foreach ($request->input('options') as $index => $option) {
            $answer = new Answer();
            $answer->question_id = $question->id;
            $answer->jawaban = $option;
            $answer->status = ($index + 1) == $request->input('correct_answer') ? 1 : 0;
            $answer->save();
        }

        return redirect()->route('admin.manageQuizzes', ['content' => $quiz->content_id])
            ->with('success', 'Question added successfully.');
        }

    public function editQuestion(Quiz $quiz, Question $question)
    {
        // var_dump($question);
        $answers = Answer::where('question_id', $question->id)->get();
        // var_dump($answers);
        return view('admin.edit_question', [
            'title' => 'Course',
            'quiz' => $quiz,
            'question' => $question,
            'answers' => $answers,
        ]);
    }

    public function updateQuestion(Request $request, Quiz $quiz, Question $question)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'options' => 'required|array|min:1',
        ]);

        $question->pertanyaan = $request->input('pertanyaan');
        $question->prev_quest = $request->input('prev_quest');
        $question->next_quest = $request->input('next_quest');
        $question->point = $request->input('point');
        $question->save();
        foreach ($request->input('options') as $index => $option) {
            $answer = Answer::find($request->input('answer_ids')[$index]);
            if ($answer) {
            $answer->jawaban = $option;
            $answer->status = ($index + 1) == $request->input('correct_answer') ? 1 : 0;
            $answer->save();
            }
        }

        return redirect()->route('admin.manageQuizzes', ['content' => $quiz->content_id])
            ->with('success', 'Question updated successfully.');
    }
    public function destroyQuestion(Quiz $quiz, Question $question)
    {
        $question = Question::find($question->id);
        $question->delete();
        $answers = Answer::where('question_id', $question->id)->get();
        foreach ($answers as $answer) {
            $answer->delete();
        }
        

        return redirect()->route('admin.manageQuizzes', ['content' => $quiz->content_id])
            ->with('success', 'Question deleted successfully.');
    }

  
}
