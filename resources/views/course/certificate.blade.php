@extends('course.layouts.main')

@section('content')
<div class="flex flex-col course-materials">
    <!-- Materi -->
    <div class="flex flex-col justify-items-center w-full rounded-2xl py-16 mb-8 text-white text-center box-cert" style="background: linear-gradient(180deg, #008C7A 0%, #005F73 100%);">
        <div class="backdrop-blur-sm bg-white/20 rounded-2xl py-8 px-4 shadow-sm backdrop-cert">
            <p class="font-semibold text-4xl tracking-wide mb-8 cert-text">Congratulations!</p>
            <p class="text-lg font-light">Anda berhasil menyelesaikan course </p>
            <p class="font-semibold text-xl mb-8 ">{{ $course->judul }}</p>
            <p class="font-light"> Sekarang mungkin saat yang tepat untuk berbagi pencapaian Anda dengan keluarga atau teman.</p>
        </div>
    </div>

    <!-- <div class="flex flex-col items-center w-full mb-8 text-center">
            <p>Lihat Sertifikat kamu disini:</p>
            <a href="/certificate" class="btn btn-primary mt-2 text-white normal-case w-fit shadow-md">Lihat Sertifikat</a>
        </div> -->

    <!-- <div class="flex flex-col items-center w-full mb-8 text-center">
        <button id="download-certificate" class="btn btn-primary mt-2 text-white normal-case w-fit shadow-md">Download Sertifikat</button>
    </div> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script type="text/javascript">
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Add background image
            const img = new Image();
            img.src = '/res/img/bg-certificate.jpg';
            img.onload = function() {
                doc.addImage(img, 'JPEG', 0, 0, doc.internal.pageSize.getWidth(), doc.internal.pageSize.getHeight());

                // Add text
                doc.setTextColor(255, 255, 255);
                doc.setFontSize(30);
                doc.text("Congratulations!", doc.internal.pageSize.getWidth() / 2, 50, { align: 'center' });

                doc.setFontSize(16);
                doc.text("Anda berhasil menyelesaikan course", doc.internal.pageSize.getWidth() / 2, 70, { align: 'center' });

                doc.setFontSize(20);
                doc.text("{{ $course->judul }}", doc.internal.pageSize.getWidth() / 2, 90, { align: 'center' });

                doc.setFontSize(16);
                doc.text("Sekarang mungkin saat yang tepat untuk berbagi pencapaian Anda dengan keluarga atau teman.", doc.internal.pageSize.getWidth() / 2, 110, { align: 'center' });

                // Save the PDF
                doc.save("certificate.pdf");
            };
        }
        document.getElementById('download-certificate').addEventListener('click', generatePDF);       
    </script>
    </script>

    @endsection