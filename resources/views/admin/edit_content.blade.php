@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Content</div>
    <form action="{{ route('admin.updateContent', ['content' => $content->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <input type="hidden" name="course_id" value="{{ $content->course_id }}">
        <input type="hidden" name="sub_course_id" value="{{ $content->sub_course_id }}">
        <div class="form-group mb-4">
            <label for="sub_course_id" class="form-label"> ID</label>
            <p class="form-control w-full border border-gray-300 p-2 rounded bg-gray-200">{{ $content->id }}</p>
        </div>
        <div class="form-group mb-4">
            <label for="judul" class="form-label">Content Title</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="judul" name="judul" value="{{ $content->judul }}" placeholder="Enter content title" required>
        </div>
        <div class="form-group mb-4">
            <label for="tipe_content" class="form-label">Content Type</label>
            <select class="form-control w-full border border-gray-300 p-2 rounded bg-gray-200" id="tipe_content" name="tipe_content" disabled>
            <option value="1" {{ $content->tipe_content == 1 ? 'selected' : '' }}>Materi</option>
            <option value="2" {{ $content->tipe_content == 2 ? 'selected' : '' }}>Quiz</option>
            <option value="3" {{ $content->tipe_content == 3 ? 'selected' : '' }}>Evaluation</option>
            <option value="4" {{ $content->tipe_content == 4 ? 'selected' : '' }}>Certificate</option>
            <option value="5" {{ $content->tipe_content == 5 ? 'selected' : '' }}>LKPD</option>
            </select>
            <input type="hidden" name="tipe_content" value="{{ $content->tipe_content }}">
        </div>
        <div class="form-group mb-4 flex flex-row w-full">
            <div>
                <label for="prev_id" class="form-label mr-2">Previous Content ID</label>
                <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="prev_id" name="prev_id" value="{{ $content->prev_id }}" placeholder="Enter previous content ID">
            </div>
            <div class="mx-4">
                <label for="next_id" class="form-label mr-2">Next Content ID</label>
                <input type="number" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="next_id" name="next_id" value="{{ $content->next_id }}" placeholder="Enter next content ID">
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-full">Update Content</button>
    </form>
    <button id="helpButton" class="btn btn-info mt-4">? Panduan mengisi konten</button>
    <!-- Help Button -->

    <!-- Help Modal -->
    <div id="helpModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-3/4 max-w-lg">
            <h2 class="text-xl font-bold mb-4">Panduan Pengisian Data Konten</h2>
            <p class="mb-2"><strong>Judul Konten:</strong> Masukkan judul konten yang ingin Anda tambahkan.</p>
            <p class="mb-2"><strong>Tipe Konten:</strong> Pilih tipe konten yang sesuai (Materi, Quiz, Evaluasi, atau LKPD).</p>
            <p class="mb-2"><strong>ID Konten Sebelumnya:</strong> Masukkan ID konten sebelumnya jika ada, atau biarkan kosong.</p>
            <p class="mb-2"><strong>ID Konten Berikutnya:</strong> Masukkan ID konten berikutnya jika ada, atau biarkan kosong.</p>
            <p class="mb-2 bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4">
                <strong>Notes penting:</strong> Untuk mengisi id Konten sebelumnya dan sesudahnya, pastikan harus sesuai dengan urutannya, bisa dilihat dalam data subcourse tentang content yang ada di dalam materi. Jika ini adalah konten pertama yang ada di dalam course, maka isi prev_id dengan 0. Jika ini adalah konten terakhir dalam course, maka isi next_id dengan 0. Perhatikan juga bagaimana cara menghubungkan subcourse dengan subcourse lainnya.
            </p>
            <button id="closeModal" class="btn btn-secondary mt-4">Tutup</button>
        </div>
    </div>

    <script>
        document.getElementById('helpButton').addEventListener('click', function() {
            document.getElementById('helpModal').classList.remove('hidden');
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('helpModal').classList.add('hidden');
        });
    </script>
</div>
@endsection
