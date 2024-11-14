@extends('admin.layouts.main')

@section('content')
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
    <div class="text-lg font-bold text-primary mb-4">Data Pengerjaan Evaluasi Course</div>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
              <th class="text-white"></th>
              <th class="text-white">Nama</th>
              <th class="text-white">Judul Course</th>
              <th class="text-white">Nilai</th>
              <th class="text-white">Status</th>
              <th class="text-white">Action</th>
            </tr>
            </thead>
          <tbody>
            @foreach ($evaluation as $e)
            <tr>
              <th>{{ $loop->iteration }}</th>
              <td>
              @if(isset($e->detailLearning->learning->user->name))
                {{ $e->detailLearning->learning->user->name }}
              @else
                <div class="badge badge-error text-white">User Not Found</div>
              @endif
              </td>
              <td>{{ $e->detailLearning->learning->course->judul }}</td>
              <td>{{ $e->nilai }}</td>
              <td>
              @if ($e->status == 0)
                <div class="badge badge-error text-white">Belum Mengerjakan</div></td>
              @else
                @if ($e->status == 1)
                  <div class="badge badge-primary text-white">Belum Diperiksa</div></td>
                @else
                  <div class="badge badge-success text-white">Selesai</div></td>
                @endif
                @endif
                
              <td>
                <a href="/admin/evaluation/detail/{{ $e->id }}" class="btn btn-sm btn-info rounded-lg normal-case text-white shadow-lg w-24">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg> 
                        <p>Update</p> 
                    </div>
                </a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
@endsection