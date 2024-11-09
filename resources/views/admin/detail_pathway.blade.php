@extends(auth()->user()->is_admin ? 'admin.layouts.main' : 'main.layouts.main')

@section('content')

<div class="flex flex-col justify-items-center w-full bg-no-repeat bg-cover rounded-2xl py-16 mb-8 text-white text-center" style="background-image: url({{ $pathway->image }})">
    <div class="backdrop-blur-sm bg-gray-500/20 rounded-2xl py-8 px-4 shadow-sm">
        <p class="font-semibold text-4xl tracking-wide mb-8" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{ $pathway->name }}</p>
        <p class="text-lg font-light mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">{{$pathway->description}}</p>
    </div>
</div>

<div class="container mx-auto px-4">
    @if(auth()->user()->is_admin)
    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.courses.create', ['pathway_id' => $pathway->id]) }}" class=" text-white font-bold py-2 px-4 rounded-full transition duration-300  btn-orange">
            Add Course to Pathway
        </a>
    </div>
    @endif
    @if($pathwayCourses->isEmpty())
    <div class="flex justify-center items-center h-64">
        <p class="text-2xl font-bold text-gray-500">There are no courses yet for this pathway</p>
    </div>
    @else
    <div class="pathway-container">
        @if(session('success'))
        <div class="alert-green">
            {{ session('success') }}
        </div>
        @endif
        @foreach ($pathwayCourses as $index => $course)
        <div class="pathway-card" data-aos="fade-up">

            <div class="relative flex flex-col w-72 px-4 pt-2 pb-4 bg-white rounded-2xl shadow-xl space-y-3 my-4 m-4 pathway-item">
                <div class="absolute top-0 left-0 text-white rounded-full w-12 h-12 flex items-center justify-center text-2xl font-bold animate-bounce shadow-2xl bg-blue-200">
                    {{ $index + 1 }}
                </div>
                <img class="object-scale-down w-32 mt-4" src="{{ $course->icon }}" alt="courses" />
                <p class="text-xs text-orange-400">{{ $course->author }}</p>
                <p class="text-lg font-semibold">{{ $course->course_name }}</p>
                <p class="text-sm text-gray-700"> {{ $course->course_description }}</p>
                @if(auth()->user()->is_admin)
                    <a class="text-white font-bold py-2 px-4 rounded-xl transition duration-300 ease-in-out transform hover:scale-105 w-full text-center my-4 btn-orange" href="/admin_detail_course/{{ $course->course_id }}">Selengkapnya</a>
                @else
                    <a class="text-white font-bold py-2 px-4 rounded-xl transition duration-300 ease-in-out transform hover:scale-105 w-full text-center my-4 btn-orange" href="/detail_course/{{ $course->course_id }}">Selengkapnya</a>
                @endif
                @if(auth()->user()->is_admin)
                <div class="absolute top-0 right-0 flex space-x-2 p-2">
                    <a href="{{ route('admin.courses.edit', ['course' => $course->id]) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l-4 4v4h4l4-4m1.768-1.768l3.536-3.536a2.5 2.5 0 00-3.536-3.536l-3.536 3.536M9 11l4-4m0 0l4 4m-4-4v4" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.courses.destroy', ['course' => $course->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300 ease-in-out transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif
            </div>
            <div class="pathway-description bg-white rounded-lg shadow-md p-4">
                <p class="text-sm text-gray-700 text-blue">Step ke - <strong>{{ $index + 1 }} </strong></p>
                <p class="text-sm text-gray-700">{{ $course->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
</div>

@endsection