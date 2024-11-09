@extends(auth()->user()->is_admin ? 'admin.layouts.main' : 'main.layouts.main')


@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    @if(auth()->user()->is_admin)
        <div class="text-lg font-bold text-primary mb-4">Admin Pathway Management</div>
    @else
        <div class="text-lg font-bold text-primary mb-4">Welcome to Pathway</div>
    @endif
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

    @if(auth()->user()->is_admin)
    <div class="mb-4">
        <a class="btn bg-orange-500" href="/pathway/add">Add Pathway</a>
    </div>
    @endif

    <div class="mb-4">
        <form action="{{ route('admin.pathway') }}" method="GET">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search pathways..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-r-lg hover:bg-primary-dark">Search</button>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto">

        <div class="challenge-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($pathways as $pathway)
            <div class="flex flex-col w-full p-4 bg-white rounded-2xl shadow-xl space-y-4 m-4 transform transition duration-500 hover:scale-105 bg-no-repeat bg-left-bottom" style="background-image: url(res/img/ic-card-challenge.svg);">
                <img class="object-cover w-full h-32 rounded-t-2xl" src="{{ $pathway->image }}" alt="pathway">
                <div class="flex flex-col space-y-2">
                    <p class="font-semibold text-xl">{{ $pathway->name }}</p>
                    <p class="text-sm text-gray-600">{{ $pathway->description }}</p>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <a class="btn bg-blue-500 text-white rounded-xl px-4 py-2 bg-blue-200" href="/detail_pathway/{{ $pathway->id }}">Details</a>
                    @if(auth()->user()->is_admin)
                    <div class="flex space-x-4">
                        <a class="text-blue-500 hover:text-blue-700 text-lg" href="/admin/edit_pathway/{{ $pathway->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="text-red-500 hover:text-red-700 text-lg" onclick="showDeleteModal('{{ $pathway->name }}', '{{ $pathway->id }}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Delete Pathway
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete the pathway <span id="pathwayName" class="font-bold"></span>? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Delete
                        </button>
                    </form>
                    <button type="button" onclick="hideDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>

        <script>
            function showDeleteModal(name, id) {
                document.getElementById('pathwayName').innerText = name;
                document.getElementById('deleteForm').action = '/admin/delete_pathway/' + id;
                document.getElementById('deleteModal').classList.remove('hidden');
            }

            function hideDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }
        </script>
        <div class="mt-4 flex justify-between items-center">
            <div>
            Showing {{ $pathways->firstItem() }} to {{ $pathways->lastItem() }} of {{ $pathways->total() }} results
            </div>
            <div>
            {{ $pathways->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
