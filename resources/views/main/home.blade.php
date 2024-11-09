@extends('main.layouts.main')

@section('content')
@if(session()->has('error-admin'))
<div class="alert alert-error shadow-lg">
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span>Maaf Anda bukan admin!</span>
  </div>
</div>
@endif
<div class="flex p-8 h-[30rem] justify-between items-center bg-orange-400 rounded-2xl mt-4">
  <div class="">
    <p class="font-semibold text-white text-6xl mb-8 drop-shadow-md mt-4"
      data-aos="fade-right">Welcome to Bytesize Learning</p>
    <p class="text-xl mb-6 text-white">Ayo belajar Informatika dengan mudah dan
      menyenangkan!</p>
    <a href="/courses" class="btn rounded-xl normal-case text-primary hover:bg-secondary hover:text-white border-0">Lihat Courses</a>
  </div>
  <!-- <div><img src="res/img/ecraft2learn-3d.png" alt="" class="img-jumbotron"
    data-aos="fade-up"
    ></div> -->
</div>
@endsection