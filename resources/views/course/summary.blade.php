<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} - Bytesize Learning </title>
    <link rel="icon" type="image/x-icon" href="/res/favicon.ico"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/43.3.1/ckeditor5-premium-features.css" />
  </head>
  <body>
    <div class="flex">
      <!-- Content -->
      <div class="w-full h-full">
        <!-- Content Header -->
        @include('course.partials.header')
        <!-- End Content Header -->
        
        <div class="flex flex-col p-0">
            <div class="bg-no-repeat bg-cover h-full" style="background-image: url(/res/img/bg-course.jpg)">
                <div class="px-20 py-16 text-white">
                    <p class="font-medium text-lg mb-4">{{ $course->author }}</p>
                    <p class="font-semibold text-4xl">{{ $course->judul }}</p>
                </div>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Daftar Isi -->
        <div class="flex flex-wrap m-8 justify-start gap-5">
            <div class="flex flex-col items-center h-fit bg-base-100 rounded-2xl border-2 border-gray-200 summary-progres">
                <p class="text-lg font-semibold text-orange-400 my-2">Progres Belajar</p>
                <div class="radial-progress bg-gray-100 border-8 border-gray-100 text-orange-400 text-xl font-semibold my-2" style="--value:{{ $progres }}; --size:6rem;">{{ round($progres) }}%</div>
                @if($status != 2)
                <p class="text-sm text-gray-600 my-2">Materi terakhir</p>
                <p class="text-sm font-semibold text-gray-600 mb-4 mx-2 text-center">{{ $last }}</p>
                @else
                <p class="text-sm font-semibold text-gray-600 my-2 mx-2 text-center">Selamat! anda telah menyelesaika course ini.</p>
                @endif
                <form action="/continue" method="POST">
                @csrf
                    <input type="hidden" name="learning_id" value="{{ $learning->id }}">
                    <button type="submit" class="btn btn-primary rounded-xl normal-case text-white mb-8">@if($status == 0) Mulai Belajar @else @if($status == 2) Lihat Hasil Belajar @else Lanjutkan belajar @endif @endif</button>
                </form>
            </div>
            <div class="flex flex-col mx-4 summary-materials ">
                @php
                    $sub_count = 1;
                @endphp
                @foreach ($sub_course as $sub)
                <div class="flex flex-col justify-center bg-base-100 rounded-2xl border-2 px-8 py-4 mb-6 border-gray-200">
                    <p class="text-lg font-semibold text-info mb-2">{{ $sub->judul_sub }}</p>
                    <p class="text-gray-500 text-sm mb-4">{{ $sub->desc }}</p>
                        @php
                            $con_count = 1;
                        @endphp
                        @foreach ($content as $con)
                        @if ($sub->id == $con->sub_course_id)
                        <div class="flex justify-start items-center mb-2">
                            <p class="flex bg-info w-8 h-8 rounded-md mr-4 justify-center items-center font-semibold text-white">{{ $sub_count }}.{{$con_count++ }}</p>
                            <p class="text-gray-500"> {{ $con->judul }}</p> 
                        </div>
                        @endif
                        @endforeach
                    
                </div>
                @php
                    $sub_count++;
                @endphp
                @endforeach
            </div>
        </div>
<!-- End Daftar Isi -->
      </div>
      <!-- End Content -->
    </div>
  </body>
</html>
