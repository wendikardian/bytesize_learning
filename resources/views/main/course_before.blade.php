@extends('main.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="flex flex-col justify-center items-center ">
      <div class="text-lg font-bold text-primary mb-4">Cari Course</div>

      <div class="form-control mb-8">
        <div class="input-group">
          <input type="text" placeholder="Search…" class="input input-bordered " />
          <button class="btn btn-square" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
          </button>
        </div>
      </div>
    </div>
    

    <div class="grid grid-cols-3 justify-items-center">
      @foreach ($courses as $course)
      <div class="flex flex-col w-72 px-4 pt-2 pb-4 bg-base-100 rounded-2xl shadow-xl space-y-3 my-4 m-4">
        <img class="object-scale-down w-32" src="{{ $course->icon }}" alt="courses"/>
        <p class="text-xs text-orange-400">{{ $course->author }}</p>
        <p class="text-lg font-semibold">{{ $course->judul }}</p> 
        <p class="text-sm"> {{ $course->desc }}</p>
        <a class="btn btn-primary w-full rounded-xl normal-case text-white my-4" href="/detail_course/{{ $course->id }}">Selengkapnya</a>
      </div>
      @endforeach

    </div>
  </div>
@endsection