@extends('course.layouts.main')

@section('content')
    <div class="flex flex-col course-materials">
        <!-- Materi -->
        <div  class="flex flex-col justify-center w-full bg-base-100 rounded-2xl border-2 p-8 mb-8 border-gray-200 text-gray-500">
            <p class="text-2xl font-semibold mb-4">{{ $content->judul }}</p>
            
            <div class="flex justify-center leading-relaxed mb-8">
                <ul class="steps">
                    <a href="/content/{{ $taken->detail_learning_id }}"><li data-content="i" class="step step-primary">Info</li></a>
                    <?php $i = 1; ?>
                    @foreach ($allQuestion as $step)
                        <a @if($step->status == 2) href="/content/quiz/{{ $step->quiz_taken_id }}/{{ $step->id }}" @endif><li data-content="{{ $i }}" class="step {{ ($step->status == 2) ? 'step-primary' : 'step-neutral' }}">Soal {{ $i }}</li></a>
                        <?php $i++ ?>
                    @endforeach
                    <a @if($taken->status == 2) href="/content/quiz-result/{{ $taken->detail_learning_id }}/{{ $taken->id }}" @endif><li data-content="S" class="step {{ ($step->status == 2) ? 'step-primary' : 'step-neutral' }}">Selesai</li></a>
                  </ul>
            </div>
            
            <div class="leading-relaxed">
                {!! $quiz->desc !!}
            </div>

            <div class="flex justify-start">

          
                <form action="/start-quiz" method="POST">
                    @csrf
                    <input type="hidden" name="quizTakenId" value="{{ $taken->id }}">
                    <button type="submit" class="btn btn-primary mt-4 text-white normal-case">
                        @if($taken->status == 0)
                        <p>Mulai</p>
                        @else
                        @if ($taken->status == 1)
                        <p>Lanjutkan</p>
                        @else
                        @if ($taken->status == 2)
                        <p>Lihat Hasil</p>
                        @endif
                        @endif
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
@endsection