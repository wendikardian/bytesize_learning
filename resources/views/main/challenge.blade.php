@extends('main.layouts.main')

@section('content')
@if(auth()->user())
<div class="flex  flex-col p-6"> 
    <div class="challenge-badge justify-items-center text-gray-600">
      <!-- Card 1 -->
      <a href="#" class="flex flex-col w-72 px-4 pt-2 pb-4 bg-base-100 rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-right-bottom" >
        <p class="text-lg font-semibold text-orange-400">{{ $recap['finish'] }}</p>
        <p>Tantangan Selesai</p>
      </a>
      <!-- End Card 1 -->

      <!-- Card 2 -->
      <a href="#" class="flex flex-col w-72 px-4 pt-2 pb-4 bg-base-100 rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-right-bottom" >
        <p class="text-lg font-semibold text-orange-400">{{ $recap['wait'] }}</p>
        <p>Menunggu Diperiksa</p>
      </a>
      <!-- End Card 2 -->

      <!-- Card 3 -->
      <a href="#" class="flex flex-col w-72 px-4 pt-2 pb-4 bg-base-100 rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-right-bottom" >
        <p class="text-lg font-semibold text-orange-400">{{ $recap['point'] }} Poin</p>
        <p>Diperoleh Dari Tantangan</p>
      </a>
      <!-- End Card 3 -->

    </div>
</div>
@endif

<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
  <div class="flex flex-col justify-center items-center ">
    <div class="text-lg font-bold text-primary mb-4">Explore Tantangan</div>
  </div>
  
  <div class="challenge-container">

    @foreach ($challenge as $c)
    <div class="flex flex-col w-72 px-4 pt-2 pb-4 bg-base-100 rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-left-bottom m-4
    card-challenge
    " style="background-image: url(res/img/ic-card-challenge.svg);">
      <p class="font-semibold">{{ $c->judul }}</p> 
      <p class="text-sm"> {{ $c->deskripsi }}</p>
      <p class="text-sm">Reward:</p>
      <div class="flex">
          <!-- <img class="w-6 h-6 rounded-full mr-2" src="res/img/ic-xp.jpg" alt=""> -->
           <p class="text-orange-400 font-semibold">XP : </p>
          <p class="text-orange-400 font-semibold">+ {{ $c->xp }}</p>
      </div>
      <div class="flex">
          <!-- <img class="w-6 h-6 rounded-full mr-2" src="res/img/ic-point.jpg" alt=""> -->
          <p class="text-orange-400 font-semibold">Point : + {{ $c->point }}</p>
      </div>
      <a class="btn btn-primary w-40 rounded-xl self-end normal-case text-white my-4" href="/challenge/detail/{{ $c->id }}">Lihat Tantangan</a>
  </div>
    @endforeach
    
  </div>
</div>
@endsection