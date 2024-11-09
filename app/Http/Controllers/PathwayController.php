<?php

namespace App\Http\Controllers;

use App\Models\Pathway;
use App\Models\PathwayCourse;
use App\Models\Course;
use Illuminate\Http\Request;

class PathwayController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $pathways = Pathway::where('name', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $pathways = Pathway::paginate(10);
        }
        return view('admin/pathway', [
            "title" => "Pathway",
            "pathways" => $pathways,
            "search" => $search
        ]);
    }
    public function addPathway()
    {
        return view('admin.add_pathway', ['title' => 'Pathway']);
    }

    public function storePathway(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathway = new Pathway();
        $pathway->name = $request->input('name');
        $pathway->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->extension();
            $image->move(public_path('res/pathway'), $imageName);
            $pathway->image = '/res/pathway/' . $imageName;
        }

        $pathway->save();

        return redirect()->route('admin.pathway')->with('success', 'Pathway added successfully.');
    }

    public function editPathway(Pathway $pathway)
    {
        return view('admin.edit_pathway', ['title' => 'Edit Pathway', 'pathway' => $pathway]);
    }

    public function updatePathway(Request $request, Pathway $pathway)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathway->name = $request->input('name');
        $pathway->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->extension();
            $image->move(public_path('res/pathway'), $imageName);
            $pathway->image = '/res/pathway/' . $imageName;
        }

        $pathway->save();

        return redirect()->route('admin.pathway')->with('success', 'Pathway updated successfully.');
    }


    public function deletePathway(Pathway $pathway)
    {
        if ($pathway->image) {
            $imagePath = public_path($pathway->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $pathway->delete();

        return redirect()->route('admin.pathway')->with('success', 'Pathway deleted successfully.');
    }

    public function detailPathway(Pathway $pathway)
    {
        $pathwayCourses = PathwayCourse::where('pathway_id', $pathway->id)->with('course')->get();
        $pathwayCourses = PathwayCourse::where('pathway_id', $pathway->id)
            ->join('courses', 'pathway_courses.course_id', '=', 'courses.id')
            ->orderBy('pathway_courses.order')
            ->get(['pathway_courses.*', 'courses.judul as course_name', 'courses.desc as course_description', 'courses.author', 'courses.ratings', 'courses.thumb', 'courses.icon']);
        // var_dump($pathwayCourses);
        // var_dump($pathwayCourses->pluck('course_id')->toArray());
        return view('admin.detail_pathway', [
            'title' => 'Pathway',
            'pathway' => $pathway,
            'pathwayCourses' => $pathwayCourses,
        ]);
    }

    public function createCourse($pathway_id)
    {
        $courses = Course::all();
        return view('admin.assign_course_pathway', [
            'title' => 'Pathway',
            'pathway_id' => $pathway_id,
            'courses' => $courses
        ]);
    }

    public function storeCourse(Request $request, $pathway_id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'order' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $pathwayCourse = new PathwayCourse();
        $pathwayCourse->pathway_id = $pathway_id;
        $pathwayCourse->course_id = $request->input('course_id');
        $pathwayCourse->order = $request->input('order');
        $pathwayCourse->description = $request->input('description');
        $pathwayCourse->save();

        return redirect()->route('admin.detailPathway', ['pathway' => $pathway_id])->with('success', 'Course assigned to pathway successfully.');
    }


    public function editPathwayCourse($id)
    {
        $pathwayCourse = PathwayCourse::findOrFail($id);
        $courses = Course::all();

        return view('admin.edit_assign_course_pathway', [
            'title' => 'Edit Pathway Course',
            'pathwayCourse' => $pathwayCourse,
            'courses' => $courses
        ]);
    }
    

    
    public function updatePathwayCourse(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'order' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $pathwayCourse = PathwayCourse::findOrFail($id);
        $pathwayCourse->course_id = $request->input('course_id');
        $pathwayCourse->order = $request->input('order');
        $pathwayCourse->description = $request->input('description');
        $pathwayCourse->save();

        return redirect()->route('admin.detailPathway', ['pathway' => $pathwayCourse->pathway_id])->with('success', 'Pathway course updated successfully.');
    }

    public function destroyPathwayCourse($id)
    {
        $pathwayCourse = PathwayCourse::findOrFail($id);
        $pathwayCourse->delete();

        return redirect()->route('admin.detailPathway', ['pathway' => $pathwayCourse->pathway_id])->with('success', 'Pathway course deleted successfully.');
    }
}
