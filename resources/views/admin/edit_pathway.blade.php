@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Edit Pathway</div>
    <form action="{{ route('admin.updatePathway', $pathway->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mx-auto w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="name" class="form-label">Pathway Name</label>
            <input type="text" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="name" name="name" value="{{ $pathway->name }}" placeholder="Enter pathway name" required>
        </div>
        <div class="form-group mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="description" name="description" rows="3" placeholder="Enter pathway description" required>{{ $pathway->description }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" id="image" name="image" accept="image/*">
        </div>
        <div class="form-group mb-4">
            <label for="imagePreview" class="form-label">Image Preview</label>
            <img id="imagePreview" class="w-24 h-24 border border-gray-300 p-2 rounded-full" src="{{ $pathway->image }}" alt="Image Preview" style="display: {{ $pathway->image ? 'block' : 'none' }};">
        </div>
        <button type="submit" class="btn btn-primary w-full">Update Pathway</button>
    </form>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('imagePreview');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection