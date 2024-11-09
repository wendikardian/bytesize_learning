@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Sub Course</div>
    <form action="{{ route('admin.updateSubCourse', ['sub_course' => $sub_course->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="judul_sub" class="form-label">Sub Course Title</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="judul_sub" name="judul_sub" value="{{ $sub_course->judul_sub }}" placeholder="Enter sub course title" required>
        </div>
        <div class="form-group mb-4">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="desc" name="desc" rows="10" placeholder="Enter sub course description" required>{{ $sub_course->desc }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-full">Update Sub Course</button>
    </form>
</div>
@endsection
