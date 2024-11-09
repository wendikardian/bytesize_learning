@extends('main.layouts.main')

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
                <img class="object-cover h-20 w-20 rounded-lg shadow-xl mr-4" src="{{ $user->image ? $user->image : 'res/img/user-default.png' }}" alt="">
                <div>
                    <p class="font-semibold text-lg">{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <p>Siswa</p>
                </div>
            </div>
            <div class="justify-self-end">
                <button class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">
                    <a href="/edit/profile">
                        Edit Profil
                    </a>
                </button>
            </div>

        </div>

        <div class="rounded-2xl p-6 bg-gray-100 mb-6">
            <p class="text-xl font-semibold mb-4 text-orange-400">Course Selesai</p>
            @forelse ($learning as $f)
            <div class="flex bg-base-100 shadow-lg rounded-2xl">
                <img class="w-28 h-28 p-4 " src="{{ $f->course->icon }}" alt="completed">
                <div class="flex flex-col p-4 w-full justify-between">
                    <p class="text-gray-600 font-semibold">{{ $f->course->judul }}</p>
                    <div class="self-end space-x-4">
                        <a href="/summary/{{ $f->id }}" class="btn btn-sm btn-outline btn-primary rounded-lg normal-case  shadow-lg">Lihat Course</button>
                            <a class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">Lihat Sertifikat</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex flex-col items-center w-full py-8 px-8 text-center text-gray-500">
                <p class="font-semibold text-lg mb-4">Maaf, kamu belum menyelesaikan course apapun.</p>
                <p class="text-lg mb-2">Join Course lainnya disini</p>
                <a href="/courses" class="btn btn-primary rounded-xl normal-case text-white">Lihat Course</a>
            </div>
            @endforelse
        </div>

        <div class="rounded-2xl p-6 bg-gray-100 mb-6">
            <p class="text-xl font-semibold mb-4 text-orange-400">Tantangan Selesai</p>
            @foreach ($challenge as $c)
            <div class="flex justify-between items-center bg-base-100 rounded-2xl shadow-lg p-6 bg-no-repeat bg-left-bottom" style="background-image: url(res/img/ic-profile-challenge.svg);">
                <p class="font-semibold mr-6">{{ $c->challenge->judul }}</p>
                <a href="/challenge/detail/{{ $c->challenge->id }}/{{ $c->id }}" class="btn btn-sm btn-primary rounded-lg normal-case text-white shadow-lg">Lihat Hasil</a>
            </div>
            @endforeach
        </div>

    </div>
    <div class="flex-col profile-2">
        <div class="flex flex-col w-full space-y-4 mb-6">
            <div class="bg-orange-400 rounded-2xl shadow-lg px-4 py-2 bg-no-repeat bg-right-bottom" style="background-image: url(res/img/bg-level.svg);">
                <p class="font-semibold ">Level</p>
                <p class="font-semibold text-2xl">{{ $achievement->level }}</p>
            </div>
            <div class="bg-orange-400 rounded-2xl shadow-lg px-4 py-2 bg-no-repeat bg-right-bottom" style="background-image: url(res/img/bg-xp.svg);">
                <p class="font-semibold ">Experience</p>
                <p class="font-semibold text-2xl">{{ $achievement->total_xp }}</p>
            </div>
            <div class="bg-orange-400 rounded-2xl shadow-lg px-4 py-2 bg-no-repeat bg-right-bottom" style="background-image: url(res/img/bg-point.svg);">
                <p class="font-semibold ">Point</p>
                <p class="font-semibold text-2xl">{{ $achievement->total_point }}</p>
            </div>
        </div>
        <div class="flex flex-col items-center w-full mb-6 bg-gray-100 rounded-xl p-4">
            <p class="text-lg font-semibold">Lencana Saya</p>
            <div class="grid grid-cols-3 gap-3 mt-4">
                <div class="bg-white rounded-full w-20 h-20 shadow-lg">
                    <img src="res/img/icon-ss.png" alt="">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection