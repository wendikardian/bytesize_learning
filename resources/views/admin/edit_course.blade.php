@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Course</div>
    <form action="{{ route('admin.updateCourse', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="judul" class="form-label">Course Title</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="judul" name="judul" value="{{ $course->judul }}" placeholder="Enter course title" required>
        </div>
        <div class="form-group mb-4">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="desc" name="desc" rows="3" placeholder="Enter course description" required>{{ $course->desc }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="author" name="author" value="{{ $course->author }}" placeholder="Enter author name" required>
        </div>
        <div class="form-group mb-4">
            <label for="requirements" class="form-label">Requirements</label>
            <div id="requirements-list" class="space-y-2">
                @php
                $requirements = explode('</li>', str_replace(['<ul class="list-inside list-disc leading-relaxed">', '<li>', '</ul>'], '', $course->requirement));
                @endphp

                @foreach($requirements as $item)
                @if(!empty(trim($item)))
                <div class="flex items-center">
                    <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" name="requirement[]" value="{{ trim($item) }}" placeholder="Enter course requirement" required>
                    <button type="button" class="ml-2 btn btn-secondary" onclick="removeRequirement(this)">-</button>
                </div>
                @endif
                @endforeach
                <div class="flex items-center mt-2">
                    <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" name="requirement[]" placeholder="Enter course requirement">
                    <button type="button" class="ml-2 btn btn-secondary" onclick="addRequirement()">+</button>
                </div>
            </div>
        </div>



        <script>
            function addRequirement() {
                const requirementsList = document.getElementById('requirements-list');
                const newRequirement = document.createElement('div');
                newRequirement.classList.add('flex', 'items-center', 'mt-2');
                newRequirement.innerHTML = `
                <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" name="requirement[]" placeholder="Enter course requirement" required>
                <button type="button" class="ml-2 btn btn-secondary" onclick="removeRequirement(this)">-</button>
            `;
                requirementsList.appendChild(newRequirement);
            }

            function removeRequirement(button) {
                const requirementDiv = button.parentElement;
                requirementDiv.remove();
            }
        </script>
        <div class="form-group mb-4">
            <label for="rating" class="form-label">Rating</label>
            <div id="rating" class="flex space-x-2">
                @for($i = 1; $i <= 5; $i++)
                    <button type="button" class="star {{ $course->ratings >= $i ? 'text-yellow-500' : '' }}" data-value="{{ $i }}">★</button>
                    @endfor
            </div>
            <input type="hidden" id="rating-input" name="ratings" value="{{ $course->ratings }}" required>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.star');
                const ratingInput = document.getElementById('rating-input');

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const value = this.getAttribute('data-value');
                        ratingInput.value = value;
                        updateStars(value);
                    });
                });

                function updateStars(value) {
                    stars.forEach(star => {
                        if (star.getAttribute('data-value') <= value) {
                            star.classList.add('text-yellow-500');
                        } else {
                            star.classList.remove('text-yellow-500');
                        }
                    });
                }
            });
        </script>
        <style>
            .star {
                font-size: 2rem;
                cursor: pointer;
                color: #d1d5db;
                /* default color (gray-300) */
            }

            .star.text-yellow-500 {
                color: #f59e0b;
                /* yellow-500 */
            }
        </style>
        <div class="form-group mb-4">
            <label for="thumb" class="form-label">Thumbnail</label>
            <input type="file" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="thumb" name="thumb" accept="image/*" onchange="previewImage(event, 'thumb-preview')">
            <img id="thumb-preview" src="{{ $course->thumb }}" alt="Current Thumbnail" class="mt-2 w-32 h-32 object-cover">
        </div>
        <div class="form-group mb-4">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="icon" name="icon" accept="image/*" onchange="previewImage(event, 'icon-preview')">
            <img id="icon-preview" src="{{ $course->icon }}" alt="Current Icon" class="mt-2 w-32 h-32 object-cover">
        </div>

        <script>
            function previewImage(event, previewId) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById(previewId);
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <button type="submit" class="btn btn-primary w-full">Update Course</button>
    </form>
</div>
@endsection
