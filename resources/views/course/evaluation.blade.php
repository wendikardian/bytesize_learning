@extends('course.layouts.main')

@section('content')
<div class="flex flex-col course-materials">
    <!-- Materi -->
    <div class="flex flex-col justify-center w-full bg-base-100 rounded-2xl border-2 p-8 mb-8 border-gray-200 text-gray-500">
        <p class="text-2xl font-semibold mb-4">{{ $content->judul }}</p>
        <div class="leading-relaxed mb-8">
            <p>Untuk menyelesaikan course ini dan mendapatkan sertifikat diharuskan menyelesaikan tahap evaluasi dengan mengerjakan studi kasus. </p>
            <p class="font-semibold text-lg mt-4">Studi Kasus</p>
            <p>{!! $evaluation->studi_kasus !!}</p>
            <div class="border-t-2 border-orange-400 mt-2">
                <p class="font-semibold text-lg my-4">Penilaian </p>
                <div class="overflow-x-auto">
                    <table class="border-separate border-spacing-4" style="width: 100%; overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Skor</th>
                                <th>Point</th>
                                <th
                                    style="min-width: 300px;">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rubrik as $r)
                            <tr>
                                <?php $x = 1; ?>
                                <td>
                                    <div class="flex text-primary">
                                        @while ($x <= (5 - $loop->index))
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            <?php $x++; ?>
                                            @endwhile
                                    </div>
                                </td>
                                <td>{{ $r->point }}</td>
                                <td>{!! $r->desc !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <details class="group mb-4 rounded-2xl">
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
                <p>{!! $evaluation->step !!}</p>
            </div>
        </details>

        <div class="flex w-full flex-wrap gap-5">
            @if ($eval_taken->status == 2)
            <div class="flex flex-col w-2/3 mr-4 border-2 rounded-2xl p-4 box-responsive">
                <p class="text-lg font-semibold mb-4">File Jawaban</p>
                <div class="flex justify-center items-center w-full">
                    <div class="flex flex-col justify-center items-center w-full h-24 bg-orange-100 rounded-lg border-2 border-orange-300 border-dashed cursor-pointer">
                        <p>{{ $eval_taken->file_path }}</p>
                    </div>
                </div>
            </div>

            @else
            <form action="/eval-submit" method="POST" enctype="multipart/form-data" class="flex flex-col w-2/3 mr-4 border-2 rounded-2xl p-4 box-responsive">
                @csrf
                <p class="mb-4 text-lg font-semibold">Unggah Jawaban</p>
                <div class="flex justify-center items-center w-full">
                    <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-24 bg-orange-100 rounded-lg border-2 border-orange-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div id="file-area" class="flex flex-col justify-center items-center pt-5 pb-6">
                            <p id="inst" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                            <p id="type" class="text-xs text-gray-500 dark:text-gray-400">File berformat .xml</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="answer" />
                    </label>
                    @error('answer')
                    <p id="err-name" class="my-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="eval_id" value="{{ $eval_taken->id }}">
                </div>

                <button type="submit" class="btn btn-primary w-20 self-end rounded-xl normal-case text-white mt-4">Kirim</button>
            </form>
            @endif


            <div class="flex flex-col justify-between w-1/3 border-2 rounded-2xl p-4 box-responsive">
                <div>
                    <p class="font">Tanggal Pengumpulan</p>
                    <p class="font-semibold">@if($eval_taken->status>=1) {{ $eval_taken->waktu_pengumpulan }} @else -- -- ---- @endif</p>
                </div>

                <div>
                    <p class="font">Status</p>
                    <p class="font-semibold">
                        @if ($eval_taken->status==1)
                    <p class="font-semibold text-orange-400">Menunggu Diperiksa</p>
                    @else
                    @if($eval_taken->status==2)
                    <p class="font-semibold text-success text-lg">Selesai</p>
                    @else
                    <p class="font-semibold text-red-400">Belum Mengumpulkan</p>
                    @endif
                    @endif
                    </p>
                </div>

                <div>
                    <p class="font">Nilai</p>

                    @if ($eval_taken->status==1)
                    <p class="font-semibold text-orange-400">Menunggu Dinilai </p>
                    @else
                    @if($eval_taken->status==2)
                    <div class="flex items-center">
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" disabled {{ ($eval_taken->nilai <= 20 && $eval_taken->nilai >= 0) ? 'checked' : ''}} />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" disabled {{ ($eval_taken->nilai <= 40 && $eval_taken->nilai > 20) ? 'checked' : ''}} />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" disabled {{ ($eval_taken->nilai <= 60 && $eval_taken->nilai > 40) ? 'checked' : ''}} />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" disabled {{ ($eval_taken->nilai <= 80 && $eval_taken->nilai > 60) ? 'checked' : ''}} />
                            <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" disabled {{ ($eval_taken->nilai <= 100 && $eval_taken->nilai > 80) ? 'checked' : ''}} />
                        </div>
                        <p class="ml-2">/</p>
                        <p class="font-semibold text-success text-lg ml-2">{{ $eval_taken->nilai }} </p>
                    </div>

                    @else
                    <p class="font-semibold text-red-400">Belum Mengumpulkan</p>
                    @endif
                    @endif
                    </p>
                </div>

            </div>
        </div>

    </div>

    @endsection