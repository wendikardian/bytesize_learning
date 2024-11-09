<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Setelah mempelajari bagaimana speech synthesis secara sederhana, kita akan memahami efek suara pada speech synthesis. Contohnya kita ingin membuat komputer untuk berbicara, kemudian diinterupsi oleh bel pintu, dan ada respon setelah bel pintu berbunyi, program tersebut dapat dilihat pada contoh berikut</p><br><figure class="snap-iframe" id="doorbell problem" container_style="width: 560px; height: 132px" caption=""></figure><br><p>Bagaimana apakah ada masalah pada contoh tersebut?</p> <p>Ya, Masalahnya adalah bel pintu berbunyi bersamaan dengan pengucapan kalimat pertama. Hal tersebut terjadi karena block Speak memberitahu browser untuk mulai berbicara dan block lainnya sejajar dengan block speak sehingga terjadi masalah, contoh disini adalah block <span class="bg-fuchsia-500 px-2 rounded-md text-white">play sound</span>. </p> <br><p>Untuk mengatasi masalah tersebut yaitu dengan membunyikan bel pintu setelah pengucapan kalimat pertama selesai. Untuk itu, kita memerlukan blok yang sedikit lebih kompleks yang dapat menerima tindakan yang harus dilakukan setelah blok speak dijalankan. Berikut yang harus dilakukan agar hal tersebut dapat diperbaiki :</p><br><figure class="snap-iframe" id="doorbell fix" container_style="width: 560px; height: 132px" caption=""></figure><br><p>Terlihat perbedaan bukan? Pada kasus ini kita menambahkan perintah <span class="bg-fuchsia-500 px-2 rounded-md text-white">then</span> setelah blok speak kalimat pertama dan dilanjutkan dengan pemutaran efek suara bel pintu yang ditambahkan <span class="bg-fuchsia-500 px-2 rounded-md text-white">until done</span> dan diakhiri dengan blok <span class="bg-fuchsia-500 px-2 rounded-md text-white">speak</span> untuk mengucapkan kalimat kedua.</p><br><p>Catatan:</p>
            <p>Kemampuan untuk mengungkapkan apa yang harus terjadi setelah selesai berbicara adalah kemampuan yang berguna. Misalnya, program mungkin berbicara beberapa penjelasan dan kemudian melakukan sesuatu di layar. Dalam beberapa contoh di chapter selanjutnya program akan mendengarkan suara yang diucapkan oleh kita setelah program selesai bicara.</p><br><p>Mari kita lanjutkan ke materi selanjutnya yaitu mengontrol speech synthesis!</p>
            <p>Berikut beberapa ide proyek yang mungking dapat dikerjakan oleh teman-teman nantinya</p>
            <br>
            <ol class="list-alpha">
              <li>Mintalah sprite bermain di mana setiap sprite berbicara dengan suara yang berbeda.</li>
              <li>Buat pembaca halaman yang berbicara tentang konten di web.</li>
              <li>Tingkatkan program untuk berbicara saat dijalankan untuk menghasilkan penjelasan atau bantuan dalam
                debugging.</li>
              <li>Buat jam bicara atau kalkulator.</li>
              <li>Buat permainan mengeja di mana kata-kata yang akan dieja diucapkan.</li>
            </ol>

            <ol class="list-decimal ml-4 leading-loose">
              <li>Gunakan template snap berikut <a class="text-info font-bold"
                  href="https://ecraft2learn.github.io/ai/snap/snap.html?project=speaking&editMode"
                  target="_blank">(Klik)</a></li>
              <li>Gunakan atau buang blok yang ada atau juga menambahkan untuk menyelasikan studi kasus</li>
              <li>Setelah dirasa selesai, klik icon file putih di pojok kiri atas</li>
              <li>Pilih save as, kemudian pilih computer, dan merubah nama file lalu tekan tombol save</li>
              <li>File pekerjaan tada akan berformat .XML</li>
              <li>Upload file tersebut di form upload jawaban dan tunggu hingga dinilai oleh ahli</li>
            </ol>

        </body>
</html>