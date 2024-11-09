@extends('course.layouts.main')

@section('content')
<div class="flex flex-col course-materials">
    <!-- Materi -->
    <div class="flex flex-col justify-center w-full bg-base-100 rounded-2xl border-2 p-8 mb-8 border-gray-200 text-gray-500">
        <p class="text-2xl font-semibold mb-4">Hasil {{ $content->judul }}</p>

        <div class="flex justify-center leading-relaxed mb-8">
            <ul class="steps">
                <a href="/content/{{ $taken->detail_learning_id }}">
                    <li data-content="i" class="step step-primary">Info</li>
                </a>
                <?php $i = 1; ?>
                @foreach ($allQuestion as $step)
                <a @if($step->status == 2) href="/content/quiz/{{ $step->quiz_taken_id }}/{{ $step->id }}" @endif><li data-content="{{ $i }}" class="step @if($step->status == 2) step-primary @else step-neutral @endif ">Soal {{ $i }}</li></a>
                <?php $i++ ?>
                @endforeach
                <a @if($taken->status == 2) href="/content/quiz-result/{{ $taken->detail_learning_id }}/{{ $taken->id }}" @endif><li data-content="S" class="step @if($taken->status == 2) step-primary @else step-neutral @endif">Selesai</li></a>
            </ul>
        </div>

        <div class="leading-relaxed">
            <div class="text-center text-lg">
                <p>Selamat, Kamu telah menyelesaikan asah pengetahuan dan berhasil menambah point!</p>
                <div class="flex justify-center my-4">
                    <p
                        class="flex justify-center bg-info w-28 h-28 rounded-full mr-4 my-2 items-center font-semibold text-white text-5xl">
                        {{ $taken->total_point }} <br><span class="text-2xl">Point</span>
                    </p>
                </div>

                <p>Terima kasih sudah mengisi kuis pengetahuan untuk materi <span class="font-semibold">{{ $sub->judul_sub }}</span>. Kamu bisa membaca
                    materi tersebut dan berlatih kembali walaupun sudah menyelesaikan kuis ini</p>
            </div>
        </div>
    </div>
    @endsection