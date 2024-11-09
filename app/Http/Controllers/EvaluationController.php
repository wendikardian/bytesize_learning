<?php

namespace App\Http\Controllers;

use App\Models\DetailLearning;
use App\Models\EvaluationTaken;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index(DetailLearning $detailLearning)
    {
        $detail = DetailLearning::find($detailLearning->id);
        $ld = $detail->learning->detailLearning;
        $content = $detail->content;
        $course = $content->course;

        $eval_taken = $detail->evaluationTaken;
        $evaluation = $eval_taken->evaluation;
        $rubrik = $evaluation->rubrik;

        return view('course/evaluation', [
            "title" => "Evaluasi",
            "page" => "content",
            "content" => $content,
            "sub_course" => $course->subCourse,
            "allContent" => $course->content,
            "allDetail" => $ld,
            "evaluation" => $evaluation,
            "eval_taken" => $eval_taken,
            "rubrik" => $rubrik,
            "detail" => $detail
        ]);
    }

    public function upload(Request $request)
    {
        $question = new Evaluation();
        $question->id = 0;
        $question->exists = true;

        $image = $question->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }
    public function evalSubmit(Request $request)
    {
        $request->validate([
            'answer' => 'file|required|max:2048'
        ]);

        $eval_taken = EvaluationTaken::find($request->input('eval_id'));
        if ($request->file()) {
            $fileName = time() . '_' . $eval_taken->detailLearning->learning->user_id . '_' . $request->file('answer')->getClientOriginalName();
            if ($request->file('answer')->storeAs('eval-course', $fileName)) {
                $eval_taken->file_path = $fileName;
                $eval_taken->waktu_pengumpulan = date('Y-m-d H:i:s');
                $eval_taken->status = 1;
                $eval_taken->save();
            }
        }

        return back();
    }

    public function manageEvaluations($content_id)
    {
        $evaluation = Evaluation::where('content_id', $content_id)->first();

        if (!$evaluation) {
            $evaluation = new Evaluation();
            $evaluation->content_id = $content_id;
            $evaluation->xp = 0;
            $evaluation->studi_kasus = '-';
            $evaluation->step = '-';
            $evaluation->save();
        }

        return view('admin.manage_evaluation', [
            'title' => 'Course',
            'evaluation' => $evaluation,
            'content_id' => $content_id
        ]);
    }

    public function storeEvaluations(Request $request, $evaluation_id, $content_id)
    {
        $request->validate([
            'studi_kasus' => 'required|string',
            'step' => 'required|string',
            'xp' => 'required|integer'
        ]);

        $evaluation = Evaluation::find($evaluation_id);
        if ($evaluation) {
            $evaluation->studi_kasus = $request->input('studi_kasus');
            $evaluation->step = $request->input('step');
            $evaluation->xp = $request->input('xp');
            $evaluation->save();
        }

        return redirect()->route('admin.manageEvaluations', ['content_id' => $content_id])
                         ->with('success', 'Evaluation updated successfully');
    }
}
