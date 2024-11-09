@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="overflow-x-auto">
        <div class="flex flex-col my-4 bg-gray-100 rounded-t-3xl">
            <!-- render the subcourse title -->
            <div class="flex justify-between items-center p-4 bg-info">
                <h1 class="text-2xl font-bold text-white">{{ $sub_course->judul_sub }}</h1>
            </div>
            <div class="flex justify-around flex-wrap p-6 gap-5 w-full">
                <div class="w-full">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a class="btn bg-orange-500" href="/admin/content/{{ $sub_course->id }}/add">Tambahkan konten baru</a>
                    @if($contents->isEmpty())
                        <div class="flex justify-center items-center h-64"></div>
                            <h2 class="text-3xl font-bold text-gray-500">Belum ada konten yang tersedia</h2>
                        </div>
                    @else
                    <table class="w-full shadow-lg rounded-lg overflow-hidden mt-5">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-300 text-left">ID</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Judul</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Tipe Konten</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Prev ID</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Next ID</th>
                                <th class="py-2 px-4 bg-gray-300 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                            <tr class="border-b {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="py-2 px-4">{{ $content->id }}</td>
                                <td class="py-2 px-4">{{ $content->judul }}</td>
                                <td class="py-2 px-4">
                                    @switch($content->tipe_content)
                                        @case(1)
                                            Materi
                                            @break
                                        @case(2)
                                            Quiz
                                            @break
                                        @case(3)
                                            Evaluasi
                                            @break
                                        @case(4)
                                            Certificate
                                            @break
                                        @case(5)
                                            LKPD
                                            @break
                                        @default
                                            Unknown
                                    @endswitch
                                </td>
                                <td class="py-2 px-4">{{ $content->prev_id }}</td>
                                <td class="py-2 px-4">{{ $content->next_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex space-x-2">
                                        @if($content->tipe_content == 1)
                                            <a class="btn bg-orange-500" href="/admin/content/materials/{{ $content->id }}/manage">Manage Materials</a>
                                        @elseif($content->tipe_content == 2)
                                            <a class="btn bg-orange-500" href="/admin/content/quizzes/{{ $content->id }}/manage">Manage Quiz</a>
                                        @elseif($content->tipe_content == 3)
                                            <a class="btn bg-orange-500" href="/admin/content/evaluations/{{ $content->id }}/manage">Manage Evaluation</a>
                                        @elseif($content->tipe_content == 4)
                                            <a class="btn bg-orange-500" href="/admin/content/certificates/{{ $content->id }}/manage">Lihat sertifikat</a>
                                        @elseif($content->tipe_content == 5)
                                            <a class="btn bg-orange-500" href="/admin/content/lkpds/{{ $content->id }}/manage">Manage LKPD</a>
                                        @else
                                            <a class="btn bg-orange-500" href="/admin/content/{{ $content->id }}/detail">Manage Content</a>
                                        @endif
                                        <a class="btn bg-orange-500 " href="/admin/content/{{ $content->id }}/edit">Edit</a>
                                        <button type="button" class="btn bg-orange-500" onclick="showDeleteModal('{{ $content->judul }}', '{{ $content->id }}')">Delete</button>

                                        <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                            <div class="bg-white rounded-lg p-6 w-1/3 shadow-modal">
                                                <h2 class="text-xl font-bold mb-4">Are you sure you want to delete this content?</h2>
                                                <p id="contentTitle" class="mb-4"></p>
                                                <div class="flex justify-end space-x-4">
                                                    <button class="btn bg-yellow-400 text-white" onclick="hideDeleteModal()">Cancel</button>
                                                    <form id="deleteForm" method="POST" action="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-red-500 text-white">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            function showDeleteModal(contentTitle, contentId) {
                                                document.getElementById('contentTitle').innerText = contentTitle;
                                                document.getElementById('deleteForm').action = `/admin/content/${contentId}/delete`;
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
                    @endif
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
