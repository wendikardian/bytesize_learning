<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeTaken;
use App\Models\DetailLearning;
use App\Models\EvaluationTaken;
use App\Models\Learning;
use App\Models\Notification;
use App\Models\SubCourse;
use App\Models\Content;
use App\Models\QuizTaken;
use App\Models\Course;
use App\Models\User;
use App\Models\Material;
use App\Models\Pathway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function index()
    {
        $user = User::with(['achievement', 'challengeTaken', 'learning'])->get();
        $quiz_takens = Learning::all();
        return view('admin/home', [
            "title" => "Home",
            "user" => $user,
            "quiz_takens" => $quiz_takens
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin/profile', [
            "title" => "Profil",
            "user" => $user
        ]);
    }


    public function editProfile()
    {
        $user = auth()->user();
        return view('admin/edit_profile', [
            "title" => "Profil",
            "user" => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('res/img'), $imageName);
            $user->image = '/res/img/' . $imageName;
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('admin/edit_password', [
            "title" => "Profil",
            "user" => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully.');
    }

    function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    function random_color()
    {
        return $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }


    public function detailDashboard(User $user)
    {
        $user = User::with(['achievement', 'challengeTaken', 'learning'])->where('id', "=", $user->id)->get();
        $arrayDataPointUser = array();
        $arrayDataPengalamanUser = array();
        $arrayNamaPointUser = array();
        $arrayColorPointUser = array();
        $arrayColorPengalamanUser = array();
        $arrayColorChallengesUser = array();
        $arrayDataChallengesUser = array();
        $arrayNamaChallengesUser = array();
        $arrayColorQuizTakensUser = array();
        $arrayDataQuizTakensUser = array();
        $arrayNamaQuizTakensUser = array();
        $arrayColorEvaluationTakensUser = array();
        $arrayDataEvaluationTakensUser = array();
        $arrayNamaEvaluationTakensUser = array();
        $check = array();
        foreach ($user as $value) {
            array_push($arrayDataPointUser, $value->achievement->total_point);
            array_push($arrayDataPengalamanUser, $value->achievement->total_xp);
            array_push($arrayNamaPointUser, $value->name);
            array_push($arrayColorPointUser, "#" . $this->random_color());
            array_push($arrayColorPengalamanUser, "#" . $this->random_color());
            if ($value->challengeTaken) {
                foreach ($value->challengeTaken as $dataChallenge) {
                    $challenge = Challenge::where('id', '=', $dataChallenge->challenge_id)->first();
                    array_push($arrayColorChallengesUser, "#" . $this->random_color());
                    array_push($arrayDataChallengesUser, $dataChallenge->score);
                    array_push($arrayNamaChallengesUser, $challenge->judul);
                }
            }
            $quizTaken = QuizTaken::select("courses.judul", DB::raw('sum(quiz_takens.total_point) as total_point'))
                ->join('detail_learnings', 'quiz_takens.detail_learning_id', 'detail_learnings.id')
                ->join('learnings', 'detail_learnings.learning_id', 'learnings.id')
                ->join('courses', 'learnings.course_id', 'courses.id')
                ->where('learnings.user_id', "=", $value->id)
                ->groupBy('courses.id')
                ->get();
            if ($quizTaken) {
                foreach ($quizTaken as $valueQuizTaken) {
                    array_push($arrayColorQuizTakensUser, "#" . $this->random_color());
                    array_push($arrayDataQuizTakensUser, $valueQuizTaken->total_point);
                    array_push($arrayNamaQuizTakensUser, $valueQuizTaken->judul);
                }
            }
            $evaluationTaken = EvaluationTaken::select("courses.judul", DB::raw('sum(evaluation_takens.nilai) as total_point'))
                ->join('detail_learnings', 'evaluation_takens.detail_learning_id', 'detail_learnings.id')
                ->join('learnings', 'detail_learnings.learning_id', 'learnings.id')
                ->join('courses', 'learnings.course_id', 'courses.id')
                ->where('learnings.user_id', "=", $value->id)
                ->groupBy('courses.id')
                ->get();
            if ($evaluationTaken) {
                foreach ($evaluationTaken as $valueEvaluationTaken) {
                    array_push($arrayColorEvaluationTakensUser, "#" . $this->random_color());
                    array_push($arrayDataEvaluationTakensUser, $valueEvaluationTaken->total_point);
                    array_push($arrayNamaEvaluationTakensUser, $valueEvaluationTaken->judul);
                }
            }
        }
        return view('admin/detail_dashboard', [
            "title" => "Home",
            "user" => $user,
            "arrayDataPointUser" => $arrayDataPointUser,
            "arrayDataPengalamanUser" => $arrayDataPengalamanUser,
            "arrayNamaPointUser" => $arrayNamaPointUser,
            "arrayColorPointUser" => $arrayColorPointUser,
            "arrayColorPengalamanUser" => $arrayColorPengalamanUser,
            "arrayColorChallengesUser" => $arrayColorChallengesUser,
            "arrayDataChallengesUser" => $arrayDataChallengesUser,
            "arrayNamaChallengesUser" => $arrayNamaChallengesUser,
            "arrayColorQuizTakensUser" => $arrayColorQuizTakensUser,
            "arrayDataQuizTakensUser" => $arrayDataQuizTakensUser,
            "arrayNamaQuizTakensUser" => $arrayNamaQuizTakensUser,
            "arrayColorEvaluationTakensUser" => $arrayColorEvaluationTakensUser,
            "arrayDataEvaluationTakensUser" => $arrayDataEvaluationTakensUser,
            "arrayNamaEvaluationTakensUser" => $arrayNamaEvaluationTakensUser,
            "check" => $check
        ]);
    }

    public function evaluation()
    {
        $evaluation = EvaluationTaken::orderBy('status', 'asc')->get();
        return view('admin/evaluation', [
            "title" => "Evaluasi",
            "evaluation" => $evaluation
        ]);
    }


    public function course(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $course = Course::where('judul', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $course = Course::paginate(10);
        }
        return view('admin/course_management', [
            "title" => "Course",
            "courses" => $course,
            "search" => $search
        ]);
    }

    public function addCourse()
    {
        return view('admin/add_course', [
            "title" => "Course"
        ]);
    }

    public function storeCourse(Request $request)
    {
        try {



            $data = $request->validate([
                'judul' => 'required|string|max:255',
                'desc' => 'required|string',
                'author' => 'required|string|max:255',
                'ratings' => 'required|numeric|min:0|max:5',
                'requirement' => 'array',
                'thumb' => 'required',
                'icon' => 'required'
            ]);

            $requirementsArray = $request->input('requirement', []);
            if (!empty($requirementsArray)) {
                $requirementsList = '<ul class="list-inside list-disc leading-relaxed">';
                foreach ($requirementsArray as $requirement) {
                    $requirementsList .= '<li>' . htmlspecialchars($requirement) . '</li>';
                }
                $requirementsList .= '</ul>';
                $data['requirement'] = $requirementsList;
            } else {
                $data['requirement'] = null;
            }


            // Store the thumb image
            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb');
                $thumbName = time() . '_thumb.' . $thumb->extension();
                $thumb->move(public_path('res/img'), $thumbName);
                $data['thumb'] = '/res/img/' . $thumbName;
            }

            // Store the icon image
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '_icon.' . $icon->extension();
                $icon->move(public_path('res/img'), $iconName);
                $data['icon'] = '/res/img/' . $iconName;
            }

            // Convert requirements array to a string
            // $data['requirements'] = implode(', ', $data['requirements']);

            Course::create($data);
            // var_dump($data);

            return redirect()->route('admin.course')->with('success', 'Course added successfully');
        } catch (\Exception $e) {
            Log::error('Error storing course: ' . $e->getMessage());
            return redirect()->route('admin.course')->with('error', $e->getMessage());
        }
    }

    public function updateCourse(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'judul' => 'required|string|max:255',
                'desc' => 'required|string',
                'author' => 'required|string|max:255',
                'ratings' => 'required|numeric|min:0|max:5',
                'requirement' => 'array',
                'thumb' => 'nullable',
                'icon' => 'nullable'
            ]);

            $requirementsArray = $request->input('requirement', []);
            if (!empty($requirementsArray)) {
                $requirementsList = '<ul class="list-inside list-disc leading-relaxed">';
                foreach ($requirementsArray as $requirement) {
                    $requirementsList .= '<li>' . htmlspecialchars($requirement) . '</li>';
                }
                $requirementsList .= '</ul>';
                $data['requirement'] = $requirementsList;
            } else {
                $data['requirement'] = null;
            }

            // Store the thumb image
            if ($request->hasFile('thumb')) {
                $thumb = $request->file('thumb');
                $thumbName = time() . '_thumb.' . $thumb->extension();
                $thumb->move(public_path('res/img'), $thumbName);
                $data['thumb'] = '/res/img/' . $thumbName;
            }

            // Store the icon image
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '_icon.' . $icon->extension();
                $icon->move(public_path('res/img'), $iconName);
                $data['icon'] = '/res/img/' . $iconName;
            }

            $course = Course::findOrFail($id);
            $course->update($data);

            return redirect()->route('admin.course')->with('success', 'Course updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage());
            return redirect()->route('admin.course')->with('error', $e->getMessage());
        }
    }

    public function deleteCourse($id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();
            // Delete related sub courses
            SubCourse::where('course_id', $course->id)->delete();

            Content::whereIn('sub_course_id', SubCourse::where('course_id', $course->id)->pluck('id'))->delete();

            // Delete related learnings
            Learning::where('course_id', $course->id)->delete();
            return redirect()->route('admin.course')->with('success', 'Course deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting course: ' . $e->getMessage());
            return redirect()->route('admin.course')->with('error', $e->getMessage());
        }
    }

    public function editCourseView($id)
    {
        $course = Course::findOrFail($id);
        // var_dump($course);
        return view('admin/edit_course', [
            "title" => "Course",
            "course" => $course
        ]);
    }

    public function detailCourse(Course $course)
    {
        $subCourses = SubCourse::where('course_id', $course->id)->get();
        return view('admin/detail_course', [
            "title" => "Course",
            "detail_course" => $course,
            "sub_course" => $subCourses
        ]);
    }

    public function addSubCourse(Course $course)
    {
        return view('admin/add_sub_course', [
            "title" => "Course",
            "course" => $course
        ]);
    }

    public function storeSubCourse(Request $request, Course $course)
    {
        $data = $request->validate([
            'judul_sub' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $data['course_id'] = $course->id;

        SubCourse::create($data);
        return redirect()->route('admin.detailCourse', ['course' => $course->id])->with('success', 'Sub Course added successfully');
    }

    public function editSubCourse($id)
    {
        $subCourse = SubCourse::findOrFail($id);
        return view('admin/edit_sub_course', [
            "title" => "Course",
            "sub_course" => $subCourse
        ]);
    }
    public function updateSubCourse(Request $request, $id)
    {
        $data = $request->validate([
            'judul_sub' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $subCourse = SubCourse::findOrFail($id);
        $subCourse->update($data);

        return redirect()->route('admin.detailCourse', ['course' => $subCourse->course_id])->with('success', 'Sub Course updated successfully');
    }

    public function deleteSubCourse($id)
    {
        try {
            $subCourse = SubCourse::findOrFail($id);
            $subCourse->delete();
            return redirect()->route('admin.detailCourse', ['course' => $subCourse->course_id])->with('success', 'Sub Course deleted successfully');
        } catch (\Exception $e) {
            $subCourse = SubCourse::findOrFail($id);
            Log::error('Error deleting sub course: ' . $e->getMessage());
            return redirect()->route('admin.detailCourse', ['course' => $subCourse->course_id])->with('error', $e->getMessage());
        }
    }

    public function addContent($subCourseId)
    {
        $subCourse = SubCourse::findOrFail($subCourseId);
        return view('admin/add_content', [
            "title" => "Course",
            "sub_course" => $subCourse
        ]);
    }

    public function storeContent(Request $request, SubCourse $subCourse)
    {
        $data = $request->validate([
            'course_id' => 'required|integer',
            'sub_course_id' => 'required|integer',
            'judul' => 'required|string|max:255',
            'tipe_content' => 'required|integer',
            'prev_id' => 'nullable|integer',
            'next_id' => 'nullable|integer',
        ]);;

        Content::create($data);

        return redirect()->route('admin.sub_course', ['sub_course' => $subCourse->id])->with('success', 'Content added successfully');
    }

    public function deleteContent($id)
    {
        try {
            $content = Content::findOrFail($id);
            $subCourseId = $content->sub_course_id;
            $content->delete();
            return redirect()->route('admin.sub_course', ['sub_course' => $subCourseId])->with('success', 'Content deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting content: ' . $e->getMessage());
            $subCourseId = $content->sub_course_id;
            return redirect()->route('admin.sub_course', ['sub_course' => $subCourseId])->with('error', $e->getMessage());
        }
    }

    public function editContent($id)
    {
        $content = Content::findOrFail($id);
        return view('admin/edit_content', [
            "title" => "Course",
            "content" => $content
        ]);
    }

    public function updateContent(Request $request, $id)
    {
        $data = $request->validate([
            'course_id' => 'required|integer',
            'sub_course_id' => 'required|integer',
            'judul' => 'required|string|max:255',
            'tipe_content' => 'required|integer',
            'prev_id' => 'nullable|integer',
            'next_id' => 'nullable|integer',
        ]);

        $content = Content::findOrFail($id);
        $content->update($data);

        return redirect()->route('admin.sub_course', ['sub_course' => $content->sub_course_id])->with('success', 'Content updated successfully');
    }

    public function subCourseDetail(SubCourse $subCourse)
    {
        $contents = Content::where('sub_course_id', $subCourse->id)->get();
        return view('admin/sub_course_detail', [
            "title" => "Course",
            "sub_course" => $subCourse,
            "contents" => $contents
        ]);
    }

    public function manageMaterials(Content $content)
    {
        $material = Material::where('content_id', $content->id)->first();

        if ($material == null) {
            $material = Material::create([
                'content_id' => $content->id,
                'isi' => '-',
                'xp' => 0
            ]);
        }

        return view('admin/add_material', [
            "title" => "Course",
            "material" => $material,
            "content" => $content
        ]);
    }

    // public function upload(Request $request)
    // {
    //     var_dump($request->all());
    //     if ($request->hasFile('upload')) {
    //         $file = $request->file('upload');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('uploads'), $filename);

    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('uploads/' . $filename);
    //         $msg = 'File uploaded successfully';
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

    //         @header('Content-type: text/html; charset=utf-8');
    //         echo $response;
    //     }
    // }
    public function upload(Request $request)
    {


        $material = new Material();
        $material->id = 0;
        $material->exists = true;

        $image = $material->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }


    public function storeMaterials(Request $request, $material_id)
    {

        var_dump($request->all());
        var_dump($material_id);
        $material = Material::findOrFail($material_id);
        $data = $request->validate([
            'xp' => 'required|integer|min:0',
            'isi' => 'required|string',
        ]);

        $material->content_id = $material->content_id;
        $material->xp = $data['xp'];
        $material->isi = $data['isi'];
        $material->save();

        $content = Content::findOrFail($material->content_id);
        return redirect()->route('admin.sub_course', ['sub_course' => $content->sub_course_id])->with('success', 'Material added successfully');
    }

    public function evaluationDetail(EvaluationTaken $evaluationTaken)
    {
        $detail = EvaluationTaken::find($evaluationTaken->id);
        return view('admin/evaluation_detail', [
            "title" => "Evaluasi",
            "e" => $detail
        ]);
    }

    public function download(EvaluationTaken $evaluationTaken)
    {
        $eval = EvaluationTaken::find($evaluationTaken->id);
        return Storage::download('eval-course/' . $eval->file_path);
    }

    public function evaluationUpdate(Request $request)
    {
        $data = $request->validate([
            'nilai' => 'required|numeric|min:20|max:100'
        ]);

        $eval = EvaluationTaken::find($request->input('eval_id'));
        $eval->nilai = $request->input('nilai');

        foreach ($eval->evaluation->rubrik->sortBy('score') as $r) {

            if (($eval->nilai / 10) <= intval($r->score)) {
                $eval->point = $r->point;
                break;
            }
        }

        $eval->xp = $eval->evaluation->xp;
        $eval->status = 2;
        $eval->save();

        $learning  = $eval->detailLearning;
        $learning->status = 1;
        $learning->save();

        $next = $learning->content->next_id;
        $nextDetail = DetailLearning::where('content_id', $next)->first();
        $nextDetail->status = 1;
        $nextDetail->save();

        try {
            if ($nextDetail) {
                $l = $nextDetail->learning;
                $l->status = 1;
                $l->save();
            }
        } catch (\Exception $e) {
            Log::error('Error updating learning status: ' . $e->getMessage());
            return back()->with('error', 'Failed to update learning status.');
        }

        $achievement = $learning->learning->user->achievement;
        $achievement->total_point += $eval->point;
        $achievement->total_xp += $eval->xp;
        $achievement->save();

        $this->updateLevel($achievement);

        //update notification
        /*$data = [
            "user_id" => $l->user_id,
            "judul_notifikasi" => "Telah Menyelesaikan Evaluasi pada " . $l->course->judul_course,
            "id_content" => $l->id,
            "tipe" => 1
        ];

        Notification::create($data);*/

        return back();
    }

    public function challenge()
    {
        $challenge = ChallengeTaken::orderBy('status', 'asc')->get();
        return view('admin/challenge', [
            "title" => "Tantangan",
            "challenge" => $challenge
        ]);
    }



    public function challengeDownload(ChallengeTaken $challengeTaken)
    {
        $challenge = ChallengeTaken::find($challengeTaken->id);
        return Storage::download('challenge/' . $challenge->answer_file);
    }

    public function challengeDetail(ChallengeTaken $challengeTaken)
    {
        $detail = ChallengeTaken::find($challengeTaken->id);
        return view('admin/challenge_detail', [
            "title" => "Tantangan",
            "c" => $detail
        ]);
    }

    public function challengeUpdate(Request $request)
    {
        $data = $request->validate([
            'nilai' => 'required|numeric|min:0|max:100'
        ]);

        $chal = ChallengeTaken::find($request->input('c_id'));
        $chal->score = $request->input('nilai');
        if ($request->input('nilai') <= 60) {
            $chal->status = 3;
            $chal->comment = $request->input('comment');
        } else {
            $chal->status = 2;
            $chal->point = $chal->challenge->point;
            $chal->xp = $chal->challenge->xp;
            $achievement = $chal->user->achievement;
            $achievement->total_point += $chal->point;
            $achievement->total_xp += $chal->xp;
            $achievement->save();
        }

        $chal->save();
        $this->updateLevel($achievement);

        return back();
    }


}
