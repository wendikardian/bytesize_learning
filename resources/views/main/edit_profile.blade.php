@extends('main.layouts.main')

@section('content')
<div class="flex ">
    <div class="flex-col w-full">
        <h2 class="text-orange-400 text-2xl font-bold mb-4 text-center">Edit Your Profile</h2>
        <div class="flex justify-between items-center bg-gray-100 rounded-2xl p-6 mb-6 w-full">
            <div class="flex w-full">
                <form action="/update/profile" method="POST" enctype="multipart/form-data" class="w-full flex">
                @csrf
                @method('PUT')
                    <div class="flex flex-col items-center mr-4">
                        <img class="object-cover h-32 w-32 rounded-full shadow-xl border-4 border-gray-300 mb-5" src="{{ $user->image ?? '../res/img/user-default.png' }}" alt="User Image">
                        <label for="image" class="m-4 btn  rounded-lg normal-case text-white shadow-lg bg-yellow-400 mt-4">
                            Change Image
                            <input type="file" name="image" id="image" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <script>
                        document.getElementById('image').addEventListener('change', function(event) {
                            const [file] = event.target.files;
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.querySelector('img[alt="User Image"]').src = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    </script>
                    <div class="w-full">
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500 w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500 w-full" readonly>
                        </div>

                        <div class="flex w-full justify-around"
                            style="justify-content: space-between;"
                        >
                            <button type="submit" class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">Save Changes</button>

                            <button>
                                <a href="/edit/password" class="btn btn-sm rounded-lg normal-case text-black shadow-lg">Edit Password</a>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection