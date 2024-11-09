<div class="course-sidebar">
  <div class="flex flex-col course-sidebar-desktop">
    @php
    $sub_count = 1;
    @endphp
    @foreach ($sub_course as $sub)
    <details class="group mb-4 border border-gray-200 rounded-2xl">
      <summary class="flex cursor-pointer list-none flex-wrap items-center rounded-2xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 text-gray-600">
        <div class="flex flex-1 p-4 font-semibold"> {{ $sub->judul_sub }}</div>
        <div class="flex w-10 items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-open:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          {{-- <div class="ml-2 origin-left border-8 border-transparent border-l-gray-600 transition-transform group-open:rotate-90"></div> --}}
        </div>
      </summary>
      <div class="py-2 px-4 text-sm">
        @php
        $con_count = 1;
        @endphp

        @foreach ($allDetail as $det)
        @if ($sub->id == $det->content->sub_course_id)
        <a class="flex mb-4 {{ ($det->status ==1 ) ? 'text-info' : 'text-gray-600'}}" @if($det->status ==1 ) href="/content/{{ $det->id }}" @endif >
          <p>{{ $sub_count }}.{{ $con_count++ }}</p>
          <p class="ml-4">{{ $det->content->judul }}</p>
        </a>
        @endif
        @endforeach

      </div>
    </details>
    @php
    $sub_count++;
    @endphp
    @endforeach

  </div>


  <div class="flex flex-col course-sidebar-mobile   
  ">
    @php
    $sub_count = 1;
    @endphp
    @foreach ($sub_course as $sub)
    <details class="group mb-4 border border-gray-200 rounded-2xl">
      <summary class="flex cursor-pointer list-none flex-wrap items-center rounded-2xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 text-gray-600">
        <div class="flex flex-1 p-4 font-semibold"> {{ $sub->judul_sub }}</div>
        <div class="flex w-10 items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 group-open:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          {{-- <div class="ml-2 origin-left border-8 border-transparent border-l-gray-600 transition-transform group-open:rotate-90"></div> --}}
        </div>
      </summary>
      <div class="py-2 px-4 text-sm">
        @php
        $con_count = 1;
        @endphp

        @foreach ($allDetail as $det)
        @if ($sub->id == $det->content->sub_course_id)
        <a class="flex mb-4 {{ ($det->status ==1 ) ? 'text-info' : 'text-gray-600'}}" @if($det->status ==1 ) href="/content/{{ $det->id }}" @endif >
          <p>{{ $sub_count }}.{{ $con_count++ }}</p>
          <p class="ml-4">{{ $det->content->judul }}</p>
        </a>
        @endif
        @endforeach

      </div>
    </details>
    @php
    $sub_count++;
    @endphp
    @endforeach
    <div class="button-nav">
      <button id="toggle-sidebar" class="p-4 bg-orange-400 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-orange-400 ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 20l9-4.5-9-4.5-9 4.5 9 4.5zM12 12l9-4.5-9-4.5-9 4.5 9 4.5z" />
        </svg>
      </button>
    </div>

    <script>
      document.getElementById('toggle-sidebar').addEventListener('click', function() {
        document.querySelector('.course-sidebar-mobile ').classList.toggle('course-sidebar-active');
      });
    </script>
  </div>


</div>