@extends('main.layouts.main')

@section('content')
<div class="flex ">
    <div class="flex-col w-full">
        <h2 class="text-orange-400 text-2xl font-bold mb-4 text-center">Change Your Password</h2>
        @if ($errors->any())
            <div class="w-full mb-4">
                <div class="bg-red-500 text-white p-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="flex justify-between items-center bg-gray-100 rounded-2xl p-6 mb-6 w-full">
            <div class="flex w-full">
                <form action="/update/password" method="POST" class="w-full flex flex-col">
                @csrf
                @method('PUT')
                    <div class="w-full mb-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" required>
                    </div>
                    <div class="w-full mb-4">
                        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" required>
                    </div>
                    <div class="w-full mb-4">
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control w-full border border-gray-300 p-2 rounded focus:border-orange-500" required>
                    </div>
                    <div class="flex w-full justify-around" style="justify-content: space-between;">
                        <button type="submit" class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">Change Password</button>
                        <button>
                            <a href="/profile" class="btn btn-sm rounded-lg normal-case text-black shadow-lg">Cancel</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
