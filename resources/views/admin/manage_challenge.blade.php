@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Challenge Management</div>
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
        <a class="btn bg-orange-500" href="/admin/challenge/create">Add Challenge</a>
    </div>

    <div class="mb-4">
        <form action="{{ route('admin.manageChallenge') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search challenges..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-r-lg hover:bg-primary-dark">Search</button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Content</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Steps</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Points</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">XP</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($challenges as $challenge)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-lg font-semibold">{{ $challenge->judul }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{!! $challenge->deskripsi !!}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{!! $challenge->isi !!}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{!! $challenge->step !!}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{{ $challenge->point }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <p class="text-sm">{{ $challenge->xp }}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex space-x-2">
                            <a class="btn bg-orange-500 " href="/admin/edit_challenge/{{ $challenge->id }}">Edit</a>
                            <button type="button" class="btn bg-orange-500" onclick="showDeleteModal('{{ $challenge->judul }}', '{{ $challenge->id }}')">Delete</button>
                            <!-- Delete Confirmation Modal -->
                            <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white rounded-lg p-6 w-1/3 shadow-modal">
                                    <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this challenge?</h2>
                                    <p id="challengeTitle" class="mb-4"></p>
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

                                function showDeleteModal(challengeTitle, challengeId) {
                                    document.getElementById('challengeTitle').innerText = challengeTitle;
                                    document.getElementById('deleteForm').action = `/admin/challenge/delete/${challengeId}`;
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
            Showing {{ $challenges->firstItem() }} to {{ $challenges->lastItem() }} of {{ $challenges->total() }} results
            </div>
            <div>
            {{ $challenges->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection