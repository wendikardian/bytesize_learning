@extends('main.layouts.main')

@section('content')
<div class="dashboard-container grid-cols-3 gap-5 mt-4">
    <div class="col-span-2 bg-gray-100 p-6 rounded-3xl shadow-lg on-progress">
        <p class="text-lg font-bold text-primary mb-4">Sedang dipelajari</p>

        <div class="flex gap-6 flex-wrap on-process-card-container">
          <!-- Card  -->
          @forelse ($ongoing as $o)
          <div class="card w-60 bg-base-100 shadow-xl">
            <figure><img class="h-36 w-full object-cover" src="res/img/img-courses-blue.jpg" alt="courses" />
                @if(isset($o->course) && isset($o->course->judul))
                    <p class="text-lg font-semibold absolute p-4 text-white">{{ $o->course->judul }}</p>
                @else
                    <p class="text-lg font-semibold absolute p-4 text-white">Unknown Course Title</p>
                @endif
            </figure>
            @php
                $detail = $o->detailLearning;
                $total = $detail->count();
                $selesai = $detail->where('status', '1')->where('learning_id', $o->id)->count();
                $progress = $total > 0 ? ($selesai / $total) * 100 : 0;
            @endphp
            <p class="justify-end px-4 pt-2">{{ round($progress) }} %</p>
            <div class="card-body px-4 py-2 align-end w-full">
                <progress class="progress w-full progress-primary" value="{{ $progress }}" max="100"></progress>
              <div class="card-actions justify-end">
                <a href="/summary/{{ $o->id }}" class="btn btn-primary rounded-xl normal-case text-white my-4">Lanjutkan</a>
              </div>
            </div>
          </div>
          @empty
          <div class="flex flex-col items-center w-full py-8 px-8 text-center text-gray-500">
            <p class="font-semibold text-lg mb-4">Maaf, kamu sedang tidak mempelajari course apapun.</p>
            <p class="text-lg mb-2">Join Course lainnya disini</p>
            <a href="/courses" class="btn btn-primary rounded-xl normal-case text-white">Lihat Course</a>
          </div>
          @endforelse

          <!-- End Card -->
        </div>

    </div>
    <!-- Performa -->
    <div class="bg-gray-100 p-6 rounded-3xl shadow-lg perform">
      <p class="text-lg font-bold text-primary mb-4">Performa Saya</p>
      <div class="flex items-stretch">
        <!-- <img class="w-12 h-12 rounded-xl" src="res/img/ic-xp.jpg" alt=""> -->
        <div class="ml-4">
          <p class="text-gray-600 font-medium" >Pengalaman</p>
          <p class="font-bold text-primary text-lg" >{{ $achievement->total_xp }}</p>
        </div>
      </div>
      <div class="flex items-stretch mt-6">
        <!-- <img class="w-12 h-12 rounded-xl" src="res/img/ic-point.jpg" alt=""> -->
        <div class="ml-4">
          <p class="text-gray-600 font-medium" >Poin</p>
          <p class="font-bold text-primary text-lg" >{{ $achievement->total_point }}</p>
        </div>
      </div>
      <p class="text-base text-gray-600 font-medium mt-6">Lencana</p>
      <div class="grid grid-cols-4 gap-4 mt-4">
        @if ($finish)
        @foreach ($finish as $f)
        <div class="bg-white rounded-full w-12 h-12 shadow-lg">
          <img src="{{ $f->course->icon }}" alt="">
        </div>
        @endforeach
        @endif
      </div>
    </div>

    <!-- Tantangan -->
    <div class="bg-gray-100 p-6 rounded-3xl shadow-lg challenge-dashboard">
      <p class="text-lg font-bold text-primary mb-4">Tantangan</p>

      <div class="stats shadow-lg w-full my-2 bg-no-repeat bg-right-bottom">
        <div class="flex justify-between items-center py-4 px-6">
          <div>
            <p class="text-primary text-xl font-bold">{{ $challenge["finish"] }}</p>
            <p class="text-gray-600">Tantangan Selesai</p>
          </div>
          <a href="#" class="text-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>

      <div class="stats shadow-lg w-full my-2 bg-no-repeat bg-right-bottom" >
        <div class="flex justify-between items-center py-4 px-6">
          <div>
            <p class="text-primary text-xl font-bold">{{ $challenge["wait"] }}</p>
            <p class="text-gray-600">Menunggu diperiksa</p>
          </div>
          <a href="#" class="text-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>

      <div class="stats shadow-lg w-full my-2 bg-no-repeat bg-right-bottom" >
        <div class="flex justify-between items-center py-4 px-6">
          <div>
            <p class="text-primary text-xl font-bold">{{ $challenge["point"] }}</p>
            <p class="text-gray-600">Point Didapatkan</p>
          </div>
          <a href="#" class="text-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </div>

    </div>

    <div class="col-span-2 bg-gray-100 p-6 rounded-3xl dashboard-course">
      <p class="text-lg font-bold text-primary mb-4">Course Selesai</p>
      @forelse ($finish as $f)
      <div class="flex bg-base-100 shadow-lg rounded-2xl">
        <img class="w-28 h-28 p-4 " src="res/img/course-com.png" alt="completed">
        <div class="flex flex-col p-4 w-full justify-between">
            <p class="text-gray-600 font-semibold">{{ $f->course->judul }}</p>
            <div class="self-end space-x-4">
              <a href="/summary/{{ $f->id }}" class="btn btn-sm btn-outline btn-primary rounded-lg normal-case text-white shadow-lg">Lihat Course</button>
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
</div>
@endsection
