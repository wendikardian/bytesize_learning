@extends('admin.layouts.main')

@section('content')
<div class="grid">
    <!-- <div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100">
        <div class="text-lg font-bold text-primary mb-4">Point</div>
        <div class="overflow-x-auto">
            <canvas id="myPointChart"></canvas>
        </div>
    </div>
    <div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100">
        <div class="text-lg font-bold text-primary mb-4">Pengalaman</div>
        <div class="overflow-x-auto">
            <canvas id="myPengalamanChart"></canvas>
        </div>
    </div> -->
    @foreach($user as $key)
    <div class="bg-gray-100 p-6 rounded-3xl">
        <p class="text-lg font-bold text-primary mb-2">Detail Data</p>
        <div class="flex items-stretch mb-4">
            <div class="ml-4">
                <p class="text-gray-600 font-medium">Nama Pengguna : {{ $key->name }}</p>
                <p class="text-gray-600 font-medium">Email : {{ $key->email }}</p>
            </div>
        </div>
        <p class="text-lg font-bold text-primary mb-4">Performa Saya</p>
        <div class="flex items-stretch">

            <div class="ml-4">
                <p class="text-gray-600 font-medium">Pengalaman</p>
                <p class="font-bold text-primary text-lg">{{ $key->achievement->total_xp }}</p>
            </div>
        </div>
        <div class="flex items-stretch mt-6">
            <!-- <img class="w-12 h-12 rounded-xl" src="/res/img/ic-point.jpg" alt=""> -->
            <div class="ml-4">
                <p class="text-gray-600 font-medium">Poin</p>
                <p class="font-bold text-primary text-lg">{{ $key->achievement->total_point }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="grid">
    <div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100">
        <div class="text-lg font-bold text-primary mb-4">Quiz</div>
        <div class="overflow-x-auto">
            <canvas id="myQuizChart" ></canvas>
        </div>
    </div>
</div>
<div class="grid">
    <div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100">
        <div class="text-lg font-bold text-primary mb-4">Tantangan</div>
        <div class="overflow-x-auto">
            <canvas id="myTantanganChart"></canvas>
        </div>
    </div>
</div>
<div class="grid">
    <div class="flex flex-col p-6 mt-4 rounded-3xl bg-gray-100">
        <div class="text-lg font-bold text-primary mb-4">Evaluasi</div>
        <div class="overflow-x-auto">
            <canvas id="myEvaluationChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // const ctx = document.getElementById('myPointChart');

    // new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: <?php echo json_encode($arrayNamaPointUser) ?>,
    //         datasets: [{
    //             label: 'Course',
    //             data: <?php echo json_encode($arrayDataPointUser) ?>,
    //             borderWidth: 1,
    //             borderColor: <?php echo json_encode($arrayColorPointUser) ?>,
    //             backgroundColor: <?php echo json_encode($arrayColorPointUser) ?>
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         },
    //         plugins: {
    //             legend: {
    //                 display: false
    //             }
    //         }
    //     }
    // });

    // const ctxPengalaman = document.getElementById('myPengalamanChart');

    // new Chart(ctxPengalaman, {
    //     type: 'bar',
    //     data: {
    //         labels: <?php echo json_encode($arrayNamaPointUser) ?>,
    //         datasets: [{
    //             label: 'Course',
    //             data: <?php echo json_encode($arrayDataPengalamanUser) ?>,
    //             borderWidth: 1,
    //             borderColor: <?php echo json_encode($arrayColorPengalamanUser) ?>,
    //             backgroundColor: <?php echo json_encode($arrayColorPengalamanUser) ?>
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         },
    //         plugins: {
    //             legend: {
    //                 display: false
    //             }
    //         }
    //     }
    // });

    const ctxTantangan = document.getElementById('myTantanganChart');

    new Chart(ctxTantangan, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(['Course 1', 'Course 2', 'Course 4', 'Course 5', 'Course 6', 'Course 7']) ?>,
            datasets: [{
                label: 'Tantangan',
                data: <?php echo json_encode($arrayDataChallengesUser) ?>,
                borderWidth: 0,
                borderColor: <?php echo json_encode("#FF8C38") ?>,
                backgroundColor: <?php echo json_encode("#FF8C38") ?>
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const ctxQuiz = document.getElementById('myQuizChart');

    new Chart(ctxQuiz, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(['Course 1', 'Course 2', 'Course 4', 'Course 5', 'Course 6', 'Course 7']) ?>,
            datasets: [{
                label: 'Quiz',
                data: <?php echo json_encode($arrayDataQuizTakensUser) ?>,
                borderWidth: 0,
                borderColor: <?php echo json_encode("#FF8C38") ?>,
                backgroundColor: <?php echo json_encode("#FF8C38") ?>
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const ctxEvaluation = document.getElementById('myEvaluationChart');

    new Chart(ctxEvaluation, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(['Course 1', 'Course 2', 'Course 4', 'Course 5', 'Course 6', 'Course 7']) ?>,
            datasets: [{
                label: 'Quiz',
                data: <?php echo json_encode($arrayDataEvaluationTakensUser) ?>,
                borderWidth: 1,
                borderColor: <?php echo json_encode("#FF8C38") ?>,
                backgroundColor: <?php echo json_encode("#FF8C38") ?>
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

@endsection