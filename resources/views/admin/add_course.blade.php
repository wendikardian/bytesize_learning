@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Add Course</div>
    <form action="{{ route('admin.storeCourse') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="form-group mb-4">
            <label for="judul" class="form-label">Course Title</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="judul" name="judul" placeholder="Enter course title" required>
        </div>
        <div class="form-group mb-4">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="desc" name="desc" rows="3" placeholder="Enter course description" required></textarea>
        </div>
        <div class="form-group mb-4">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="author" name="author" placeholder="Enter author name" required>
        </div>
        <div class="form-group mb-4">
            <label for="requirements" class="form-label">Requirements</label>
            <div id="requirements-list" class="space-y-2">
                <div class="flex items-center">
                    <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" name="requirement[]" placeholder="Enter course requirement" required>
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
                <button type="button" class="star" data-value="1">★</button>
                <button type="button" class="star" data-value="2">★</button>
                <button type="button" class="star" data-value="3">★</button>
                <button type="button" class="star" data-value="4">★</button>
                <button type="button" class="star" data-value="5">★</button>
            </div>
            <input type="hidden" id="rating-input" name="ratings" required>
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
            <input type="file" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="thumb" name="thumb" accept="image/*" required>
        </div>
        <div class="form-group mb-4">
            <label for="icon" class="form-label">Icon</label>
            <input type="file" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="icon" name="icon" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary w-full">Add Course</button>
    </form>



</div>
</div>
@endsection
