<div class="flex justify-between items-center rounded-2xl border-2 px-8 @if ($content->tipe_content == 1) py-2 @else py-4 @endif mb-8 font-semibold">
    <div class="flex text-gray-400">
        @if($content->prev_id)
        <form action="/prev" method="POST">
            @csrf
            <input type="hidden" name="learning_id" value="{{ $detail->learning_id }}">
            <input type="hidden" name="prev_id" value="{{ $content->prev_id }}">
                <button type="submit" class="flex text-orange-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <p class="btn-responsive">Sebelumnya</p> 
                </button>
            </form>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <p class="btn-responsive">Sebelumnya</p>
        @endif
    </div>

    @if ($content->tipe_content == 1)
    <div class="flex items-center px-4">
        <form action="/finish" method="POST">
            @csrf
            <input type="hidden" name="detail_id" id="detail_id" value="{{ $detail->id }}">
            <input type="hidden" name="xp" value="{{ $material->xp }}">

            @if ($detail->status == 0)
            <button type="submit" class="relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-medium text-orange-400 transition duration-300 ease-out border-2 border-orange-400 rounded-full shadow-md group">
                <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-orange-400 group-hover:translate-x-0 ease">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </span>
                <span class="absolute flex items-center justify-center w-full h-full transition-all duration-400 transform group-hover:translate-x-full ease">Selesai</span>
                <span class="relative invisible">Selesai</span>
            </button>
            @else
            
            <div class="relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-medium rounded-full shadow-md" >
                <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white bg-orange-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </span>
                <span class="relative invisible">Selesai</span>
            </div>

            @endif
        </form>
    </div>
    @endif
    

    <div class="flex text-gray-400">
        @if($content->next_id && $detail->status == 1)
        <form action="/next" method="POST">
            @csrf
            <input type="hidden" name="learning_id" value="{{ $detail->learning_id }}">
            <input type="hidden" name="next_id" value="{{ $content->next_id }}">
                <button type="submit" class="flex text-orange-400">
                    <p class="btn-responsive">Selanjutnya</p> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        @else
        @if($content->next_id == 0 && $detail->status == 1)
        <a href="/courses" class="flex text-orange-400">
            <p>Lihat Course Lainnya</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </a>
        
        @else
        <p class="btn-responsive">Selanjutnya</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
        @endif
        
        @endif
    </div>
</div>