<div class="flex justify-between items-center rounded-2xl border-2 px-8 py-4 mb-8 font-semibold">
    <div class="flex text-gray-400">
        @if($question->prev_quest == 0)
        <form action="/prev" method="POST">
            @csrf
            <input type="hidden" name="learning_id" value="{{ $detail->id }}">
            <input type="hidden" name="prev_id" value="{{ $content->id }}">
                <button type="submit" class="flex text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <p>Intro</p> 
                </button>
        </form>
        @else
            @if($question->prev_quest)
            <form action="/prev-quest" method="POST">
                @csrf
                <input type="hidden" name="learning_id" value="{{ $detail->id }}">
                <input type="hidden" name="id" value="{{ $detailQuizTaken->id }}">
                <input type="hidden" name="prevQuest" value="{{ $question->prev_quest }}">
                    <button type="submit" class="flex text-orange-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <p>Pertanyaan Sebelumnya</p> 
                    </button>
                </form>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <p>Pertanyaan Sebelumnya</p>
            @endif
        
        @endif
    </div>

    <div class="flex text-gray-400">
        @if($content->next_id && $detail->is_true)
        <form action="/next" method="POST">
            @csrf
            <input type="hidden" name="learning_id" value="{{ $detail->id }}">
            <input type="hidden" name="next_id" value="{{ $content->next_id }}">
                <button type="submit" class="flex text-orange-400">
                    <p>Selanjutnya</p> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        @else
            @if($question->next_quest && $detailQuizTaken->status != 0 )
            <form action="/next-quest" method="POST">
                @csrf
                <input type="hidden" name="learning_id" value="{{ $detail->id }}">
                <input type="hidden" name="id" value="{{ $detailQuizTaken->id }}">
                <input type="hidden" name="nextQuest" value="{{ $question->next_quest }}">
                    <button type="submit" class="flex text-orange-400">
                        <p>Pertanyaan Selanjutnya</p> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </form>
            @else
                @if($question->next_quest == 0 && $detailQuizTaken->status == 2)
                    @if($detail->status==1)
                        <a href="/content/quiz-result/{{ $detail->id }}/{{  $detailQuizTaken->quiz_taken_id }}" class="flex text-orange-400">
                            <p>Hasil</p> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                    <p>Hasil</p>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    @endif
                @else
                <p>Pertanyaan Selanjutnya</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            @endif
            @endif
        @endif
    </div>
</div>