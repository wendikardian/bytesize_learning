@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Assigned Course to Pathway</div>
    <form action="{{ route('admin.courses.update', ['course' => $pathwayCourse->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <input type="hidden" name="pathway_id" value="{{ $pathwayCourse->pathway_id }}">

        <div class="form-group mb-4">
            <label for="course_id" class="form-label">Course</label>
            <select id="course_id" name="course_id" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" required>
                <option value="" disabled>Select a course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $pathwayCourse->course_id ? 'selected' : '' }}>{{ $course->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="order" class="form-label">Order</label>
            <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="order" name="order" value="{{ $pathwayCourse->order }}" placeholder="Enter order number" required>
        </div>

        <div class="form-group mb-4">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="description" name="description" rows="3" placeholder="Enter description" required>{{ $pathwayCourse->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary w-full">Update Assigned Course</button>
    </form>
</div>
@endsection
