@extends('main.layouts.main')

@section('content')
<div class="flex flex-row mt-4 space-x-6 text-gray-600 flex-wrap">
    <div class="flex-col challenge-1 ">
        <div class="border-2 rounded-2xl p-6 mb-4">
            {!! $detail->isi !!}
        </div>

        <div class="border-2 rounded-2xl p-6">
            <p class="text-xl font-semibold mb-4">Reward</p>
            <div class="flex items-center mb-4">
                <img class="w-8 h-8 rounded-full mr-2" src="/res/img/ic-xp.jpg" alt="">
                <p class="text-orange-400 font-semibold">+ {{ $detail->xp }}</p>
            </div>
            <div class="flex items-center ">
                <img class="w-8 h-8 rounded-full mr-2" src="/res/img/ic-point.jpg" alt="">
                <p class="text-orange-400 font-semibold">+ {{ $detail->point }}</p>
            </div>
        </div>

        <details class="group mb-4 rounded-2xl mt-4">
            <summary class="flex cursor-pointer bg-primary list-none flex-wrap items-center rounded-2xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 text-white group-open:rounded-none group-open:rounded-t-2xl group-open:bg-base-100 group-open:border-x-2 group-open:border-t-2 group-open:border-gray-200">
              <div class="flex flex-1 p-4 font-semibold text-white group-open:text-primary"> Cara Mengerjakan Dan Mengirim Jawaban</div>
              <div class="flex w-10 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-open:rotate-90 group-open:text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                {{-- <div class="ml-2 origin-left border-8 border-transparent border-l-gray-600 transition-transform group-open:rotate-90"></div> --}}
              </div>
            </summary>
            <div class="py-2 px-4 text-sm rounded-b-2xl bg-base-100 border-b-2 border-x-2 border-gray-200">
                <p>{!! $detail->step !!}</p>
            </div>
          </details>
        
    </div>
    <div class="challenge-2 flex-col">
        @auth
        @if (!$taken)
        <form action="/challenge-taken" method="POST">
        @csrf
            <input type="hidden" name="id_challenge" value="{{ $detail->id }}">
            <button type="submit" class="btn btn-primary w-full normal-case text-white">
                <p class="mr-2">Ambil Tantangan</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
            </button>
        </form>
        @else

        <form action="/challenge-answer" method="POST" enctype="multipart/form-data" class="flex flex-col border-2 rounded-2xl p-4 w-full">
            @if ($taken->status == 0 || $taken->status == 3)
            <p class="text-lg font-semibold mb-4">Unggah Jawaban</p>
            <div class="flex justify-center items-center w-full">
                @csrf
                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-24 bg-orange-100 rounded-lg border-2 border-orange-300 border-dashed cursor-pointer ">
                    <div id="file-area" class="flex flex-col justify-center items-center pt-5 pb-6">
                        <p id="inst" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                        <p id="type" class="text-xs text-gray-500 dark:text-gray-400">File berformat .xml</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="answer" />
                </label>
                <input type="hidden" name="id" value="{{ $taken->id }}"> 
            </div>
                <button type="submit" class="btn btn-primary self-end rounded-xl normal-case text-white mt-4 w-fit">@if($taken->status==3)Kirim Perbaikan @else Kirim @endif</button>
            @else
                <p class="text-lg font-semibold mb-4">File Jawaban</p>
                <div class="flex justify-center items-center w-full">
                    <div class="flex flex-col justify-center items-center w-full h-24 bg-orange-100 rounded-lg border-2 border-orange-300 border-dashed cursor-pointer">
                        <p>{{ $taken->answer_file }}</p>
                    </div>
                </div>
            @endif
            
        </form>

        @if ($taken->status == 1)
        <div class="flex w-full px-4 py-6 mt-8 bg-info rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-left-bottom" style="background-image: url(/res/img/status-wait.svg);">
            <p class="font-semibold text-white ml-16">Menunggu Diperiksa</p>
        </div>
        @else
            @if ($taken->status ==2 )
            <div class="flex w-full px-4 py-6 mt-8 bg-success rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-left-bottom" style="background-image: url(/res/img/status-selesai.svg);">
                <p class="font-semibold text-white ml-16">Selesai Diperiksa</p>
            </div>
            <div class="flex mt-8 items-center justify-center">
                <div class="flex flex-col justify-center items-center bg-primary w-32 h-32 p-4 rounded-full text-white text-center">
                    <p class="text-sm">Nilai Kamu:</p>
                    <p class="text-4xl font-bold mt-2">{{ $taken->score }}</p>
                </div>
                <div class="flex flex-col ml-8">
                    <div class="flex items-center mb-4">
                        <img class="w-8 h-8 rounded-full mr-2" src="/res/img/ic-xp.jpg" alt="">
                        <p class="text-orange-400 font-semibold">+ {{ $taken->xp }}</p>
                    </div>
                    <div class="flex items-center ">
                        <img class="w-8 h-8 rounded-full mr-2" src="/res/img/ic-point.jpg" alt="">
                        <p class="text-orange-400 font-semibold">+ {{ $taken->point }}</p>
                    </div>
                </div>
            </div>
            @else
            @if ($taken->status ==3)
            <div class="flex w-full px-4 py-6 mt-8 bg-error rounded-2xl shadow-xl space-y-2 bg-no-repeat bg-left-bottom" style="background-image: url(/res/img/status-wait.svg);">
                <p class="font-semibold text-white ml-16">Perlu Diperbaiki</p>
            </div>
            <div class="flex flex-col border-2 rounded-2xl p-4 w-full mt-4">
                <p class="text-lg font-semibold mb-2">Komentar</p>
                <p class="text-sm">{{ $taken->comment }}</p>
            </div>
            @endif
            @endif
        @endif
        @endif

        @else
        <div class="flex flex-col items-center border-2 rounded-2xl p-4 text-gray-400">
            <svg class="w-24 h-24 fill-gray-300" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.889 4.07054C22.0578 4.14032 22.2021 4.25861 22.3037 4.41045C22.4053 4.56229 22.4595 4.74085 22.4595 4.92352V9.53922H27.0752C27.258 9.53889 27.4368 9.59285 27.5889 9.69427C27.7411 9.79568 27.8596 9.93998 27.9296 10.1089C27.9996 10.2777 28.0179 10.4636 27.9822 10.6429C27.9464 10.8222 27.8582 10.9868 27.7288 11.1159L24.0362 14.8085C23.9503 14.8942 23.8484 14.9621 23.7363 15.0083C23.6241 15.0546 23.504 15.0783 23.3826 15.0781H18.226L16.8597 16.4461C16.9328 16.7199 16.9419 17.0067 16.8864 17.2845C16.8309 17.5623 16.7123 17.8236 16.5397 18.0482C16.3672 18.2729 16.1453 18.4549 15.8912 18.5801C15.6371 18.7054 15.3577 18.7706 15.0744 18.7706C14.5847 18.7706 14.1151 18.5761 13.7689 18.2299C13.4226 17.8836 13.2281 17.414 13.2281 16.9243L13.23 16.8394C13.2426 16.5636 13.317 16.2942 13.4475 16.0509C13.5781 15.8077 13.7616 15.5968 13.9844 15.4338C14.2073 15.2708 14.4638 15.1599 14.7352 15.1092C15.0066 15.0585 15.2859 15.0693 15.5526 15.1408L16.9207 13.7727V8.61608C16.9205 8.49477 16.9441 8.3746 16.9904 8.26246C17.0367 8.15031 17.1046 8.04838 17.1902 7.96249L20.8828 4.26993C21.012 4.14091 21.1765 4.0531 21.3557 4.01761C21.5348 3.98212 21.7204 4.00053 21.889 4.07054V4.07054ZM23.0005 13.2318L24.8467 11.3855H21.5364C21.2915 11.3855 21.0567 11.2882 20.8836 11.1151C20.7105 10.942 20.6132 10.7072 20.6132 10.4624V7.15198L18.7669 8.99826V13.2318H23.0005ZM26.0505 15.403C26.3691 17.7019 25.9575 20.0428 24.874 22.0952C23.7905 24.1476 22.0898 25.8078 20.0119 26.8416C17.934 27.8753 15.5839 28.2303 13.2933 27.8565C11.0028 27.4827 8.88752 26.3989 7.24612 24.7581C5.60471 23.1173 4.52009 21.0025 4.14536 18.7121C3.77063 16.4217 4.12473 14.0715 5.15767 11.9931C6.19061 9.91484 7.85021 8.21344 9.90219 7.12914C11.9542 6.04483 14.2949 5.6324 16.5939 5.95005L15.8868 6.65717C15.5941 6.94986 15.3708 7.30442 15.2332 7.69478L15.0744 7.69294C13.2419 7.69321 11.4509 8.23886 9.92958 9.26042C8.40824 10.282 7.22535 11.7332 6.53156 13.4293C5.83776 15.1254 5.66446 16.9896 6.03371 18.7845C6.40297 20.5794 7.29807 22.2238 8.60504 23.5083C9.91201 24.7928 11.5717 25.6592 13.3727 25.9973C15.1738 26.3353 17.0347 26.1297 18.7185 25.4066C20.4023 24.6835 21.8328 23.4756 22.8278 21.9368C23.8228 20.3979 24.3373 18.5978 24.3058 16.7656C24.6947 16.628 25.0479 16.4053 25.3397 16.1138L26.0487 15.403H26.0505ZM15.0744 10.4624C13.7963 10.4624 12.547 10.8413 11.4843 11.5514C10.4216 12.2614 9.59339 13.2707 9.1043 14.4514C8.61521 15.6322 8.48724 16.9315 8.73658 18.185C8.98591 19.4385 9.60136 20.5899 10.5051 21.4936C11.4088 22.3974 12.5602 23.0128 13.8137 23.2621C15.0672 23.5115 16.3665 23.3835 17.5473 22.8944C18.7281 22.4053 19.7373 21.5771 20.4473 20.5144C21.1574 19.4517 21.5364 18.2024 21.5364 16.9243H19.6901C19.6901 17.8372 19.4194 18.7296 18.9122 19.4887C18.405 20.2477 17.6842 20.8393 16.8407 21.1887C15.9973 21.538 15.0693 21.6294 14.1739 21.4513C13.2786 21.2732 12.4561 20.8336 11.8106 20.1881C11.1651 19.5426 10.7255 18.7202 10.5474 17.8248C10.3693 16.9295 10.4607 16.0014 10.81 15.158C11.1594 14.3146 11.751 13.5937 12.51 13.0865C13.2691 12.5793 14.1615 12.3086 15.0744 12.3086V10.4624Z"/>
            </svg>
            <p class="text-sm py-2 text-center ">Maaf, anda belum masuk ke akun anda untuk mengambil tantangan!</p>
            <a href="/masuk" class="btn btn-sm btn-primary normal-case text-white w-fit my-2">Masuk</a>
        </div>
        
        @endauth

    </div>
</div>
@endsection