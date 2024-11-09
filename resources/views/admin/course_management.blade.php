@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Course Management</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-4">
        <a class="btn bg-orange-500" href="/admin/course/add">Add Course</a>
    </div>

    <div class="mb-4">
        <form action="{{ route('admin.course') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search courses..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-r-lg hover:bg-primary-dark">Search</button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <img class="object-scale-down w-16 max-w-xs" style="max-width: 200px;" src="{{ $course->icon }}" alt="courses" />
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-xs text-orange-400">{{ $course->author }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-lg font-semibold">{{ $course->judul }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{{ $course->desc }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex space-x-2">
                            <a class="btn bg-orange-500 " href="/admin_detail_course/{{ $course->id }}">Selengkapnya</a>
                            <a class="btn bg-orange-500 " href="/admin_edit_course/{{ $course->id }}">Edit</a>
                            <button type="button" class="btn bg-orange-500" onclick="showDeleteModal('{{ $course->judul }}', '{{ $course->id }}')">Delete</button>
                            <!-- Delete Confirmation Modal -->
                            <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white rounded-lg p-6 w-1/3 shadow-modal">
                                    <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this course?</h2>
                                    <p id="courseTitle" class="mb-4"></p>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700">Enter Password:</label>
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
                                    document.getElementById('deleteForm').action = `/admin/course/delete/${courseId}`;
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
            </tbody>
        </table>
        <div class="mt-4 flex justify-between items-center">
            <div>
            Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} results
            </div>
            <div>
            {{ $courses->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
