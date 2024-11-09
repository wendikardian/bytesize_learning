@extends('course.layouts.main_quiz')

@section('content')
    <div class="flex flex-col course-materials">
        <!-- Materi -->
        <div  class="flex flex-col justify-center w-full bg-base-100 rounded-2xl border-2 p-8 mb-8 border-gray-200 text-gray-500">
            <p class="text-2xl font-semibold mb-4">{{ $content->judul }}</p>
            
            <div class="flex justify-center leading-relaxed mb-8">
                <ul class="steps">
                    <a href="/content/{{ $detailQuizTaken->quizTaken->detail_learning_id }}"><li data-content="i" class="step step-primary">Info</li></a>
                    <?php $i = 1; ?>
                    @foreach ($allQuestion as $step)
                        <a @if($step->status == 2) href="/content/quiz/{{ $step->quiz_taken_id }}/{{ $step->id }}" @endif><li data-content="{{ $i }}" class="step @if($step->status == 2) step-primary @else step-neutral @endif ">Soal {{ $i }}</li></a>
                        <?php $i++ ?>
                    @endforeach
                    <a @if($detailQuizTaken->quizTaken->status == 2) href="/content/quiz-result/{{ $detailQuizTaken->quizTaken->detail_learning_id }}/{{ $detailQuizTaken->quizTaken->id }}" @endif><li data-content="S" class="step @if($detailQuizTaken->quizTaken->status == 2) step-primary @else step-neutral @endif">Selesai</li></a>
                  </ul>
            </div>
            
            <div class="leading-relaxed mb-2">
                <p class="text-xl font-semibold mb-4 text-orange-400">Pertanyaan Ke-{{ $no }}</p>
                <p class="font-semibold">{!! $question->pertanyaan !!}</p>
                <form action="/answer-quiz" method="POST">
                @csrf
                @foreach ($answers as $a)
                <div class="flex-row form-control py-2 ">
                    <input type="radio" name="user_answer" id="{{ $a->id }}" value="{{ $a->id }}" class="radio checked:bg-orange-400 disabled:opacity-75" required="required" @if($a->id == $detailQuizTaken->answer_id) checked @endif @if($detailQuizTaken->status==2) disabled @endif/>
                    <label class="ml-4" for="{{ $a->id }}">{{ $a->jawaban }}</label>
                </div>
                @endforeach
                
                @if(!$detailQuizTaken->is_true)
                <div class="flex justify-between items-center">
                    <input type="hidden" name="detailQuizTakenId" value="{{ $detailQuizTaken->id }}">
                    <button type="submit" class="btn btn-primary mt-4 text-white normal-case"> Kirim Jawaban </button>
                    <p class="text-orange-400 font-semibold">Kesempatan menjawab : {{ $detailQuizTaken->current_point }}</p>
                </div>
                @endif
                </form>


                @if($detailQuizTaken->is_true)
                    <hr class="mt-4">
                    <div class="flex justify-between items-center">
                        <p class="font-semibold text-lg text-success mt-4">Jawaban Benar</p>
                        <p class="text-orange-400 font-semibold">Point : {{ $detailQuizTaken->current_point }}</p>
                    </div>
                @endif

                @if(!$detailQuizTaken->is_true && $detailQuizTaken->status != 0 )
                    <hr class="mt-4">
                    <div class="flex justify-between items-center">
                        <p class="font-semibold text-lg text-red-400 mt-4">Jawaban Salah</p>
                        <p class="text-orange-400 font-semibold">Point : {{ $detailQuizTaken->current_point }}</p>
                    </div>
                @endif
                
                
            </div>
        </div>
@endsection