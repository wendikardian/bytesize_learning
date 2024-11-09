@extends('admin.layouts.main')

@section('content')
<div class="flex flex-row mt-4 space-x-6 text-gray-600 flex-wrap">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="flex-col profile-1">
        <div class="flex justify-between items-center bg-gray-100 rounded-2xl p-6 mb-6">
            <div class="flex">
                <img class="object-cover h-20 w-20 rounded-lg shadow-xl mr-4" src="{{ $user->image ? $user->image : '../res/img/user-default.png' }}" alt="">
                <div>
                    <p class="font-semibold text-lg">{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>Administrator / Guru</p>
                </div>
            </div>
            <div class="justify-self-end">
                <button class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">
                    <a href="/admin/edit/profile">
                        Edit Profil
                    </a>
                </button>
            </div>

        </div>
    </div>
</div>
@endsection