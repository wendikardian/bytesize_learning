<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Learning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $courses = Course::where('judul', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $courses = Course::paginate(10);
        }
        return view('main/courses', [
            "title" => "Courses",
            "courses" => $courses,
            "search" => $search
        ]);
    }

  

    public function detailCourse(Course $course)
    {
        $status = 0;
        $learningId = null;
        if (Auth::check()) {
            if ($learning = Learning::where([['course_id', $course->id], ['user_id', Auth::user()->id]])->first()) {
                $status = 1;
                $learningId = $learning->id;
                if ($learning->status == 1) {
                    $status = 2;
                }
            }
        }

        return view('main/detail_course', [
            "title" => "Detail Course",
            "status" => $status,
            "learning_id" => $learningId,
            "detail_course" => $course,
            "sub_course" => $course->subCourse
        ]);
    }
}
