@extends('main.layouts.main')

@section('content')
<a class="flex items-center text-orange-400 font-semibold" href="/courses">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
    <p>Course lainnya</p>
</a>

<div class="flex flex-col my-4 bg-gray-100 rounded-t-3xl">
  <div class="flex justify-between p-6 bg-info rounded-t-3xl flex-wrap ">
    <div class="text-white mb-4 detail-course-desc">
        <p class="my-4">{{ $detail_course->author }}</p>
        <p class="font-semibold text-white text-4xl my-4 leading-relaxed">{{ $detail_course->judul }}</p>
        <div class="rating rating-sm">
            <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled/>
            <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
            <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled />
            <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled/>
            <input type="radio" name="rating-6" class="mask mask-star-2 bg-yellow-400" disabled checked/>
            <p>&nbsp&nbsp5.0 </p>
        </div>
        <p class="my-4 text-lg">
            {{ $detail_course->desc }}
        </p>
        @auth
        @if ($status >= 1)
            <a href="/summary/{{ $learning_id }}" class="btn btn-success text-white mt-4 normal-case">{{ ($status == 1)? 'Lanjutkan Belajar' : 'Lihat Hasil Belajar' }}</a>
          @else
            <form action="/join" method="POST">
            @csrf
              <input type="hidden" name="id" value="{{ $detail_course->id }}">
              <button type="submit" class="btn btn-success text-white mt-4 normal-case">Join Course</button>   
            </form>
        @endif
        @else
        <a href="/masuk" class="btn btn-success text-white mt-4 normal-case">Masuk untuk Join Course</a>
        @endauth

    </div>
    <div><img class="object-contain h-full" width="300" src="{{ $detail_course->thumb }}" alt=""></div>
  </div>
  <div class="flex justify-around flex-wrap p-6 gap-5">
    <div>
        <p class="text-lg font-semibold mb-4">Gambaran Course</p>
        <ul class="list-inside list-disc leading-relaxed">
            @foreach ($sub_course as $s)
                <li> {{ $s->judul_sub }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <p class="text-lg font-semibold mb-4">Alat yang dibutuhkan</p>
        {!! $detail_course->requirement !!}
    </div>
  </div>
  <div class="flex justify-end items-center p-4 bg-info">
    <img class="object-scale-down h-8 mx-4" src="/res/img/cc.png" alt="icon">
    <img class="object-scale-down h-10 mx-4" src="/res/img/icon-cc.png" alt="icon">
    <img class="object-scale-down h-10 mx-4" src="/res/img/ecraft2learn.png" alt="icon">
    <img class="object-scale-down h-10 w-10 mx-4" src="/res/img/oxford-icon.png" alt="icon">
  </div>
</div>
@endsection