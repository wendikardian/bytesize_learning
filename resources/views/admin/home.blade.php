@extends('admin.layouts.main')

@section('content')
<div class="flex p-8 h-[24rem] justify-between items-center bg-orange-400 rounded-2xl mt-4">
  <div class="">
    <p class="font-semibold text-white text-6xl mb-8 drop-shadow-md" style="z-index: -1;">Welcome to Bytesize Learning</p>
  </div>
  <!-- <img src="/res/img/ecraft2learn-3d.png" alt="" style="height: 300px;" class="img-jumbotron"
  data-aos="fade-up" -->
  >
</div>
<div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100 ">
  <div class="text-lg font-bold text-primary mb-4">Data Dashboard</div>
  <div class="overflow-x-auto">
    <table class="table w-full">
      <thead>
      <tr>
        <th class="text-white">No</th>
        <th class="text-white">Nama</th>
        <th class="text-white">Point</th>
        <th class="text-white">Pengalaman</th>
        <th class="text-white">Kuis</th>
        <th class="text-white">Tantangan</th>
        <th class="text-white">Evaluasi</th>
        <th class="text-white">Progres</th>
        <th class="text-white">Action</th>
      </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        @foreach($user as $value)
        @if ($value->achievement)
        <tr>
          <td>{{ $i }}</td>
          <td>{{ $value->name }}</td>
          <td>{{ $value->achievement->total_point }}</td>
          <td>{{ $value->achievement->total_xp }}</td>
          <?php
          $quiz_score = 0;
          if ($value->learning) {
            foreach ($value->learning as $key) {
              if ($key->detailLearning) {
                foreach ($key->detailLearning as $key2) {
                  if ($key2->quizTaken) {
                    $quiz_score += $key2->quizTaken->total_point;
                  }
                }
              }
            }
          }
          ?>
          <td>{{ $quiz_score }}</td>
          <?php
          $total_score = 0;
          foreach ($value->challengeTaken as $key) {
            $total_score += $key->score;
          }
          ?>
          <td>{{ $total_score }}</td>
          <?php
          $evaluation_score = 0;
          if ($value->learning) {
            foreach ($value->learning as $key) {
              if ($key->detailLearning) {
                foreach ($key->detailLearning as $key2) {
                  if ($key2->evaluationTaken) {
                    $evaluation_score += $key2->evaluationTaken->nilai;
                    $persentase = $value->achievement->total_xp * 100 / 600;
                  }
                }
              }
            }
          }
          ?>
          <td>{{ $evaluation_score }}</td>
          <td>
            <div class="card-body px-4 py-2 align-end w-full">
              <progress class="progress w-full progress-primary" value="{{ $persentase ?? '' }}" max="100"></progress>
              <p class="justify-end px-4 pt-2">{{ round(floatval($persentase ?? '')) }} % </p>
            </div>
          <td><a href="/admin/detail_dashboard/<?= $value->id ?>">Detail</a></td>
        </tr>
        <?php $i++; ?>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection