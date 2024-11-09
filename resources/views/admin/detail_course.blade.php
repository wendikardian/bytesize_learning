@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="overflow-x-auto">
        <a class="flex items-center text-orange-400 font-semibold" href="/admin/course">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <p>Course lainnya</p>
        </a>

        <div class="flex flex-col my-4 bg-gray-100 rounded-t-3xl">
            <div class="flex justify-between p-6 bg-info rounded-t-3xl flex-wrap ">
                <div class="text-white mb-4 detail-course-desc">
                    <p class="my-4">{{ $detail_course->author }}</p>
                    <p class="font-semibold text-white text-4xl my-4 leading-relaxed">{{ $detail_course->judul }}</p>
                    <div class="rating rating-sm">
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
                        <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled checked />
                        <p>&nbsp&nbsp5.0 </p>
                    </div>
                    <p class="my-4 text-lg">
                        {{ $detail_course->desc }}
                    </p>

                </div>
                <div><img class="object-contain h-full" width="300" src="{{ $detail_course->thumb }}" alt=""></div>
            </div>
            <div class="flex justify-around flex-wrap p-6 gap-5 w-full">
                <div class="w-full">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a class="btn bg-orange-500" href="/admin/course/{{ $detail_course->id }}/add">Tambahkan subjudul baru</a>
                    <table class="w-full shadow-lg rounded-lg overflow-hidden mt-5">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-300 text-left">Judul Sub Course</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Deskripsi</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sub_course->isEmpty())
                                <tr>
                                    <td colspan="3" class="py-2 px-4 text-center">Subcourse not exist</td>
                                </tr>
                            @else
                                @foreach ($sub_course as $s)
                                <tr class="border-b {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                                    <td class="py-2 px-4">{{ $s->judul_sub }}</td>
                                    <td class="py-2 px-4">{{ $s->desc }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex space-x-2">
                                            <a class="btn bg-orange-500 " href="/admin/course/{{ $s->id }}/detail">Selengkapnya</a>
                                            <a class="btn bg-orange-500 " href="/admin/course/{{ $s->id }}/edit">Edit</a>
                                            <button type="button" class="btn bg-orange-500" onclick="showDeleteModal('{{ $s->judul_sub }}', '{{ $s->id }}')">Delete</button>
                                            <!-- Delete Confirmation Modal -->
                                            <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                                <div class="bg-white rounded-lg p-6 w-1/3 shadow-modal">
                                                    <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this sub course?</h2>
                                                    <p id="courseTitle" class="mb-4"></p>
                                                    <div class="mb-4">
                                                        <label for="password" class="block text-sm font-medium text-gray-700">Type this (admin123)</label>
                                                        <input type="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                                    </div>
                                                    <div class="flex justify-end space-x-4">
                                                        <button class="btn bg-yellow-400 text-white" onclick="hideDeleteModal()">Cancel</button>
                                                        <form id="deleteForm" method="POST" action="">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" id="deleteButton" class="btn bg-red-500 text-white" disabled>Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.getElementById('password').addEventListener('input', function() {
                                                    const deleteButton = document.getElementById('deleteButton');
                                                    if (this.value === 'admin123') {
                                                        deleteButton.disabled = false;
                                                    } else {
                                                        deleteButton.disabled = true;
                                                    }
                                                });

                                                function showDeleteModal(courseTitle, courseId) {
                                                    document.getElementById('courseTitle').innerText = courseTitle;
                                                    document.getElementById('deleteForm').action = `/admin/sub_course/${courseId}/delete`;
                                                    document.getElementById('deleteModal').classList.remove('hidden');
                                                }

                                                function hideDeleteModal() {
                                                    document.getElementById('deleteModal').classList.add('hidden');
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end items-center p-4 bg-info">
                <img class="object-scale-down h-8 mx-4" src="/res/img/cc.png" alt="icon">
                <img class="object-scale-down h-10 mx-4" src="/res/img/icon-cc.png" alt="icon">
                <img class="object-scale-down h-10 mx-4" src="/res/img/ecraft2learn.png" alt="icon">
                <img class="object-scale-down h-10 w-10 mx-4" src="/res/img/oxford-icon.png" alt="icon">
            </div>
        </div>
    </div>
</div>
@endsection
