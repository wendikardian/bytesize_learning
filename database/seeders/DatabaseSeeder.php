<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\Answer;
use App\Models\Challenge;
use App\Models\Content;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Material;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Rubrik;
use App\Models\SubCourse;
use App\Models\User;
use App\Models\Learning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'email' => 'sidiqnugraha@upi.edu',
            'name' => 'Admin',
            'is_admin' => 1,
            'password' => Hash::make('admin1203'),
            'status' => 1

        ]);

        User::create([
            'email' => 'wendikardian@gmail.com',
            'name' => 'Wendi',
            'is_admin' => 1,
            'password' => Hash::make('wendikardian'),
            'status' => 1
        ]);

        // Learning::create([
        //     'course_id' => 3,
        //     'user_id' => 2,
        //     'status' => 0,
        // ]);
        Achievement::create([
            'user_id' => 2,
            'total_point' => 0,
            'total_xp' => 0,
            'level' => 0,
        ]);
        Achievement::create([
            'user_id' => 1,
            'total_point' => 0,
            'total_xp' => 0,
            'level' => 0,
        ]);

        Course::create([
            'judul' => 'Speech Synthesis dalam Artificial Intelegence',
            'desc' => 'Belajar Artificial Intelligence untuk membuat produk AI dengan Speech Synthesis dengan mudah dan menyenangkan.',
            'author' => 'Ken Kahn, University Of Oxford',
            'requirement' => '<ul class="list-inside list-disc leading-relaxed"><li>Personal Computer (PC) atau Laptop </li> <li>Internet</li> <li>Speaker dan Microphone / Earphone</li></ul>',
            'ratings' => 5.0,
            'thumb' => '/res/img/ss-thumb.png',
            'icon' => '/res/img/icon-ss.png'
        ]);

        Course::create([
            'judul' => 'Menambahkan Model Machine Learning pada Program',
            'desc' => 'Belajar cara untuk menambahkan model Machine Learning pada beberapa program dengan mudah dan menyenangkan.',
            'author' => 'Ken Kahn, University Of Oxford',
            'requirement' => '<ul class="list-inside list-disc leading-relaxed"><li>Personal Computer (PC) atau Laptop </li> <li>Internet</li> <li>Kamera / Webcam</li></ul>',
            'ratings' => 5.0,
            'thumb' => '/res/img/ml-thumb.png',
            'icon' => '/res/img/ml-icon.png'
        ]);


        Course::create([
            'judul' => 'Speech Recognition dalam Artificial Intelligence',
            'desc' => 'Belajar Artificial Intelligence untuk membuat produk AI dengan Speech Recognition dengan mudah dan menyenangkan.',
            'author' => 'Ken Kahn, University Of Oxford',
            'requirement' => '<ul class="list-inside list-disc leading-relaxed"><li>Personal Computer (PC) atau Laptop </li> <li>Internet</li> <li>Speaker dan Microphone / Earphone</li></ul>',
            'ratings' => 4.9,
            'thumb' => '/res/img/sr-thumb.png',
            'icon' => '/res/img/icon-sr.png'
        ]);
        Course::create([
            'judul' => 'Pengenalan Gambar dalam Artificial Intelligence',
            'desc' => 'Belajar Artificial Intelligence untuk membuat produk AI dengan Pengenalan Gambar dengan mudah dan menyenangkan.',
            'author' => 'Ken Kahn, University Of Oxford',
            'requirement' => '<ul class="list-inside list-disc leading-relaxed"><li>Personal Computer (PC) atau Laptop </li> <li>Internet</li> <li>Speaker dan Microphone / Earphone</li></ul>',
            'ratings' => 5.0,
            'thumb' => '/res/img/ir-thumb.png',
            'icon' => '/res/img/icon-ir.png'
        ]);
        // Menggunakan kata dan kalimat
        Course::create([
            'judul' => 'Menggunakan Kata dan Kalimat dalam Artificial Intelligence',
            'desc' => 'Belajar Artificial Intelligence untuk membuat produk AI dengan menggunakan kata dan kalimat dengan mudah dan menyenangkan (Pemrosesan Bahasa Alami).',
            'author' => 'Ken Kahn, University Of Oxford',
            'requirement' => '<ul class="list-inside list-disc leading-relaxed"><li>Personal Computer (PC) atau Laptop </li> <li>Internet</li> <li>Speaker dan Microphone / Earphone</li></ul>',
            'ratings' => 5.0,
            'thumb' => '/res/img/nlp-thumb.png',
            'icon' => '/res/img/icon-nlp.png'
        ]);





        /* ============ Course 1 ============ */
        SubCourse::create([ //1
            'course_id' => 1,
            'judul_sub' => 'Pendahuluan',
            'desc' => 'Selamat datang di course Speech Synthesis dalam Artificial Intelligence. Pertama-tama, mari kita cari tahu apa itu speech synthesis dan kegunaannya!'
        ]);

        SubCourse::create([ //2
            'course_id' => 1,
            'judul_sub' => 'Speech Synthesis Sederhana',
            'desc' => 'Pada sub materi speech synthesis sederhana kita akan memulai mempelajari beberapa blok snap! yang dapat digunakan untuk speech synthesis.'
        ]);

        SubCourse::create([ //3
            'course_id' => 1,
            'judul_sub' => 'Mengontrol Speech Synthesis',
            'desc' => 'Pada sub materi mengontrol speech synthesis kita akan mempelajari efek dan atribut kontrol pada blok speech synthesis pada snap!.'
        ]);

        SubCourse::create([ //4
            'course_id' => 1,
            'judul_sub' => 'Berbicara Bukan Kata',
            'desc' => 'Pada sub materi berbicara bukan kata kita akan mempelajari bagaimana blok snap! untuk speech synthesis dapat bekerja untuk selain bentuk kata.'
        ]);

        SubCourse::create([ //5
            'course_id' => 1,
            'judul_sub' => 'Contoh Program AI dengan Speech Synthesis',
            'desc' => 'Pada sub materi ini merupakan contoh dari penerapan blok snap! speech synthesis yang telah dipelajari di sub materi sebelumnya.'
        ]);

        SubCourse::create([ //6
            'course_id' => 1,
            'judul_sub' => 'Penutup',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);

        /* ============ Course 2 ============ */
        SubCourse::create([ //7
            'course_id' => 2,
            'judul_sub' => 'Pendahuluan',
            'desc' => 'Selamat datang di course Speech Synthesis dalam Artificial Intelligence. Pertama-tama, mari kita cari tahu apa itu speech synthesis dan kegunaannya!'
        ]);

        SubCourse::create([ //8
            'course_id' => 2,
            'judul_sub' => 'Training Gambar',
            'desc' => 'Pada sub materi speech synthesis sederhana kita akan memulai mempelajari beberapa blok snap! yang dapat digunakan untuk speech synthesis.'
        ]);

        SubCourse::create([ //9
            'course_id' => 2,
            'judul_sub' => 'Training Suara',
            'desc' => 'Pada sub materi mengontrol speech synthesis kita akan mempelajari efek dan atribut kontrol pada blok speech synthesis pada snap!.'
        ]);

        SubCourse::create([ //10
            'course_id' => 2,
            'judul_sub' => 'Training Pose',
            'desc' => 'Pada sub materi berbicara bukan kata kita akan mempelajari bagaimana blok snap! untuk speech synthesis dapat bekerja untuk selain bentuk kata.'
        ]);

        SubCourse::create([ //11
            'course_id' => 2,
            'judul_sub' => 'Contoh Program dengan Machine Learning',
            'desc' => 'Pada sub materi ini merupakan contoh dari penerapan blok snap! speech synthesis yang telah dipelajari di sub materi sebelumnya.'
        ]);

        SubCourse::create([ //12
            'course_id' => 2,
            'judul_sub' => 'Style Transfer',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);

        SubCourse::create([ //13
            'course_id' => 2,
            'judul_sub' => 'Quiz',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);

        SubCourse::create([ //14
            'course_id' => 2,
            'judul_sub' => 'Penutup',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);

        /*
        SubCourse::create([ //7
            'course_id' => 2,
            'judul_sub' => 'Pendahuluan',
            'desc' => 'Selamat datang di course Speech Recognition dalam Artificial Intelligence. Pertama-tama, mari kita cari tahu apa itu speech recognition dan kegunaannya!'
        ]);

        SubCourse::create([ //8
            'course_id' => 2,
            'judul_sub' => 'Speech Recognition Sederhana',
            'desc' => 'Pada sub materi speech recognition sederhana kita akan memulai mempelajari beberapa blok snap! yang dapat digunakan untuk speech recognition.'
        ]);

        SubCourse::create([ //9
            'course_id' => 2,
            'judul_sub' => 'Contoh Program Speech Recognition dan Speech Synthesis',
            'desc' => 'Pada sub materi ini kita akan mempelajari bagaimana speech recognition dan speech synthesis dapat bekerja bersama untuk sebuah produk Artificial Intelligence'
        ]);

        SubCourse::create([ //10
            'course_id' => 2,
            'judul_sub' => 'Part of Speech pada Speech Recognition',
            'desc' => 'Pada sub materi Part of Speech pada Speech Recognition kita akan mempelajari bagaimana blok snap! dapat membuat part of speech.'
        ]);

        SubCourse::create([ //11
            'course_id' => 2,
            'judul_sub' => 'Contoh Demo Program Menjawab Pertanyaan',
            'desc' => 'Pada sub materi ini merupakan contoh dari penerapan blok snap! speech recognition yang telah dipelajari di sub materi sebelumnya.'
        ]);

        SubCourse::create([ //12
            'course_id' => 2,
            'judul_sub' => 'Fitur Lengkap Blok Speech Recognition',
            'desc' => 'Pada sub materi ini akan diperjelas lebih dalam fitur lengkap yang dimiliki oleh blok Speech Recognition.'
        ]);

        SubCourse::create([ //13
            'course_id' => 2,
            'judul_sub' => 'Penutup',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);
*/
        // Course pengenalan gambar
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Pendahuluan',
            'desc' => 'Selamat datang di course Pengenalan Suara dalam Artificial Intelligence. Pertama-tama, mari kita cari tahu apa itu pengenalan suara dan kegunaannya!'
        ]);
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Bagaimana Program Komentar yang Diucapkan Bekerja',
            'desc' => 'Pada sub materi ini kita akan mempelajari bagaimana program komentar yang diucapkan bekerja.'
        ]);
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Keunggulan dari Speech Recognition',
            'desc' => 'Pada sub materi ini kita akan mempelajari keunggulan dari speech recognition.'
        ]);
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Fitur Lengkap Blok Speech Recognition',
            'desc' => 'Pada sub materi ini akan diperjelas lebih dalam fitur lengkap yang dimiliki oleh blok Speech Recognition.'
        ]);
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Proyek',
            'desc' => 'Pada sub materi ini teman-teman akan membuat proyek dengan menggunakan pengenalan gambar.'
        ]);
        SubCourse::create([
            'course_id' => 3,
            'judul_sub' => 'Quiz',
            'desc' => 'Pada sub materi ini terdapat evaluasi belajar teman-teman dan akan mendapatkan sertifikat.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Pengenalan',
            'desc' => 'Pada sub materi ini, teman-teman akan mempelajari pengenalan gambar dalam artificial intelligence.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Pengenalan Gambar Sederhana',
            'desc' => 'Pada sub materi ini, teman-teman akan mempelajari pengenalan gambar sederhana menggunakan Blok coding dan aplikasinya.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Pengenalan Gambar Lanjutan',
            'desc' => 'Pada sub materi ini, teman-teman akan belajar teknik lanjutan untuk pengenalan gambar hingga menggunakan API Key'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Penerapan Pengenalan Gambar',
            'desc' => 'Pada bagian ini, teman-teman akan dikenalkan dimana pengenalan gambar digunakan dalam kehidupan sehari-hari.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Computer Vision',
            'desc' => 'Pada sub materi ini, teman-teman akan dikenalkan mekanisme cara kerja Computer Vision dan aplikasinya seperti Video Recognition.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Proyek',
            'desc' => 'Pada sub materi ini, teman-teman akan membuat proyek dengan menggunakan pengenalan gambar.'
        ]);
        SubCourse::create([
            'course_id' => 4,
            'judul_sub' => 'Quiz',
            'desc' => 'Pada sub materi ini, teman-teman akan diberikan kuis untuk menguji pemahaman teman-teman.'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Pengenalan',
            'desc' => 'Pada sub materi ini, teman-teman akan mempelajari bagaimana cara komputer mengolah sebuah kata atau yang biasa sering kita sebut pemrosesan bahasa alami.'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Pemrosesan kata',
            'desc' => 'Pada bagian ini, teman-teman akan belajar bagaimana cara mengubah kata menjadi sebuah angka dan mencari kedekatan antara 1 kata dengan kata lainnya'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Pemrosesan kata dan kalimat menggunakan Snap!',
            'desc' => 'Pada bagian ini, teman-teman akan belajar bagaimana caranya menerapkan pemrosesan bahasa alami dengan menggunakan snap hingga kamu bisa membuat project mu sendiri'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Integrasikan dengan model GPT',
            'desc' => 'Pada bagian ini, teman-teman akan belajar pemrosesan bahasa alami dengan menggunakan model GPT untuk menghasilkan kata atau kalimat yang lebih baik'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Bahasa dan resiko menggunakan word embedding',
            'desc' => 'Pada bagian ini, teman-teman akan dikenalkan bahayanya teknologi pemrosesan bahasa alami apabila digunakan secara sembarangan'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Word embeddings',
            'desc' => 'Bagaimana cara Word Embeddings bekerja ? '
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Proyek',
            'desc' => 'Pada sub materi ini, teman-teman akan membuat proyek dengan mengimplementasikan Pemrosesan Bahasa Alami.'
        ]);
        SubCourse::create([
            'course_id' => 5,
            'judul_sub' => 'Quiz time',
            'desc' => 'Pada sub materi ini, teman-teman akan diberikan kuis untuk menguji pemahaman teman-teman.'
        ]);











        //-----------------------CONTENT SS---------------------//

        Content::create([ //1
            'course_id' => 1,
            'sub_course_id' => 1,
            'judul' => 'Apa itu Speech Synthesis?',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 2,
        ]);

        Content::create([ //2
            'course_id' => 1,
            'sub_course_id' => 2,
            'judul' => 'Speech Synthesis Sederhana',
            'tipe_content' => 1,
            'prev_id' => 1,
            'next_id' => 3,
        ]);

        Content::create([ //3
            'course_id' => 1,
            'sub_course_id' => 2,
            'judul' => 'Berbicara kalimat vs rangkaian kata',
            'tipe_content' => 1,
            'prev_id' => 2,
            'next_id' => 4,
        ]);

        Content::create([ //4
            'course_id' => 1,
            'sub_course_id' => 2,
            'judul' => 'Berbicara selaian bentuk kata',
            'tipe_content' => 1,
            'prev_id' => 3,
            'next_id' => 5,
        ]);

        Content::create([ //5
            'course_id' => 1,
            'sub_course_id' => 2,
            'judul' => 'Latihan',
            'tipe_content' => 1,
            'prev_id' => 4,
            'next_id' => 6,
        ]);

        Content::create([ //6
            'course_id' => 1,
            'sub_course_id' => 2,
            'judul' => 'Asah Pengetahuan 1',
            'tipe_content' => 2,
            'prev_id' => 5,
            'next_id' => 7,
        ]);

        Content::create([ //7
            'course_id' => 1,
            'sub_course_id' => 3,
            'judul' => 'Menambahkan Efek Suara',
            'tipe_content' => 1,
            'prev_id' => 6,
            'next_id' => 8,
        ]);

        Content::create([ //8
            'course_id' => 1,
            'sub_course_id' => 3,
            'judul' => 'Mengontrol Block Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 7,
            'next_id' => 9,
        ]);

        Content::create([ //9
            'course_id' => 1,
            'sub_course_id' => 3,
            'judul' => 'Mengontrol Jenis Suara Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 8,
            'next_id' => 10,
        ]);

        Content::create([ //10
            'course_id' => 1,
            'sub_course_id' => 3,
            'judul' => 'Latihan',
            'tipe_content' => 1,
            'prev_id' => 9,
            'next_id' => 11,
        ]);

        Content::create([ //11 Kuis
            'course_id' => 1,
            'sub_course_id' => 3,
            'judul' => 'Asah Pengetahuan 2',
            'tipe_content' => 2,
            'prev_id' => 10,
            'next_id' => 12,
        ]);

        Content::create([ //12
            'course_id' => 1,
            'sub_course_id' => 4,
            'judul' => 'Berbicara Bukan Kata',
            'tipe_content' => 1,
            'prev_id' => 11,
            'next_id' => 13,
        ]);

        Content::create([ //13
            'course_id' => 1,
            'sub_course_id' => 5,
            'judul' => 'Contoh AI dengan Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 12,
            'next_id' => 14,
        ]);

        Content::create([ //14
            'course_id' => 1,
            'sub_course_id' => 6,
            'judul' => 'Ide Proyek Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 13,
            'next_id' => 15,
        ]);

        Content::create([ //15
            'course_id' => 1,
            'sub_course_id' => 6,
            'judul' => 'Tahukah Kamu?',
            'tipe_content' => 1,
            'prev_id' => 14,
            'next_id' => 16,
        ]);

        Content::create([ //16
            'course_id' => 1,
            'sub_course_id' => 6,
            'judul' => 'Apakah Speech Synthesis dapat disalahgunakan?',
            'tipe_content' => 1,
            'prev_id' => 15,
            'next_id' => 17,
        ]);

        Content::create([ //17
            'course_id' => 1,
            'sub_course_id' => 6,
            'judul' => 'Latihan',
            'tipe_content' => 3,
            'prev_id' => 16,
            'next_id' => 18,
        ]);

        Content::create([ //18
            'course_id' => 1,
            'sub_course_id' => 6,
            'judul' => 'Congratulations!',
            'tipe_content' => 4,
            'prev_id' => 17,
            'next_id' => 0,
        ]);

        // CONTENT CHAPTER 4 //

        Content::create([ //19
            'course_id' => 2,
            'sub_course_id' => 7,
            'judul' => 'Machine Learning',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 20,
        ]);

        Content::create([ //20
            'course_id' => 2,
            'sub_course_id' => 7,
            'judul' => 'Pendahuluan',
            'tipe_content' => 1,
            'prev_id' => 19,
            'next_id' => 21,
        ]);

        Content::create([ //21
            'course_id' => 2,
            'sub_course_id' => 7,
            'judul' => 'Save dan Load Training Kamu',
            'tipe_content' => 1,
            'prev_id' => 20,
            'next_id' => 22,
        ]);

        Content::create([ //22
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Blok untuk Training Data Gambar dengan Kamera',
            'tipe_content' => 1,
            'prev_id' => 21,
            'next_id' => 23,
        ]);

        Content::create([ //23
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Menggunakan Sprite Costumes untuk Training',
            'tipe_content' => 1,
            'prev_id' => 22,
            'next_id' => 24,
        ]);

        Content::create([ //24
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Mengenali Gambar tanpa Training atau Layanan Cloud',
            'tipe_content' => 1,
            'prev_id' => 23,
            'next_id' => 25,
        ]);

        Content::create([ //25
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Latihan Contoh Program',
            'tipe_content' => 1,
            'prev_id' => 24,
            'next_id' => 26,
        ]);

        Content::create([ //26
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Mengenali Suara',
            'tipe_content' => 1,
            'prev_id' => 25,
            'next_id' => 27,
        ]);

        Content::create([ //27
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Latihan Contoh Program',
            'tipe_content' => 1,
            'prev_id' => 26,
            'next_id' => 28,
        ]);

        Content::create([ //28
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Model dari Google Teachable Machine',
            'tipe_content' => 1,
            'prev_id' => 27,
            'next_id' => 29,
        ]);

        Content::create([ //29
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Bagaimana Cara Kerja Deteksi Pose?',
            'tipe_content' => 1,
            'prev_id' => 28,
            'next_id' => 30,
        ]);

        Content::create([ //30
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Mendeteksi Pose-mu',
            'tipe_content' => 1,
            'prev_id' => 29,
            'next_id' => 31,
        ]);

        Content::create([ //31
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Latihan Contoh Program',
            'tipe_content' => 1,
            'prev_id' => 30,
            'next_id' => 32,
        ]);

        Content::create([ //32
            'course_id' => 2,
            'sub_course_id' => 11,
            'judul' => 'Permainan Kertas, Gunting, Batu',
            'tipe_content' => 1,
            'prev_id' => 31,
            'next_id' => 33,
        ]);

        Content::create([ //33
            'course_id' => 2,
            'sub_course_id' => 11,
            'judul' => 'Memberi Label pada Gambar berdasarkan Bagian Tubuh',
            'tipe_content' => 1,
            'prev_id' => 32,
            'next_id' => 34,
        ]);

        Content::create([ //34
            'course_id' => 2,
            'sub_course_id' => 11,
            'judul' => 'Mendeteksi Objek pada Gambar',
            'tipe_content' => 1,
            'prev_id' => 33,
            'next_id' => 35,
        ]);

        Content::create([ //35
            'course_id' => 2,
            'sub_course_id' => 12,
            'judul' => 'Membuat Gambar dengan Gaya Lukisan Terkenal',
            'tipe_content' => 1,
            'prev_id' => 34,
            'next_id' => 36,
        ]);

        Content::create([ //36
            'course_id' => 2,
            'sub_course_id' => 12,
            'judul' => 'Bagaimana Style Transfer Bekerja',
            'tipe_content' => 1,
            'prev_id' => 35,
            'next_id' => 37,
        ]);

        Content::create([ //37
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Quiz Time!',
            'tipe_content' => 2,
            'prev_id' => 36,
            'next_id' => 38,
        ]);

        Content::create([ //38
            'course_id' => 2,
            'sub_course_id' => 14,
            'judul' => 'Ide Proyek Menggunakan Machine Learning',
            'tipe_content' => 1,
            'prev_id' => 37,
            'next_id' => 39,
        ]);

        Content::create([ //39
            'course_id' => 2,
            'sub_course_id' => 14,
            'judul' => 'Resources Tambahan',
            'tipe_content' => 1,
            'prev_id' => 38,
            'next_id' => 40,
        ]);

        Content::create([ //40
            'course_id' => 2,
            'sub_course_id' => 14,
            'judul' => 'Congratulation!',
            'tipe_content' => 4,
            'prev_id' => 39,
            'next_id' => 0,
        ]);

        Content::create([ //41
            'course_id' => 3,
            'sub_course_id' => 15,
            'judul' => 'Pengenalan',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 42,
        ]);
        Content::create([ //42
            'course_id' => 3,
            'sub_course_id' => 15,
            'judul' => 'Block Speech Recognition Sederhana',
            'tipe_content' => 1,
            'prev_id' => 41,
            'next_id' => 43,
        ]);

        Content::create([ //43
            'course_id' => 3,
            'sub_course_id' => 15,
            'judul' => 'Contoh Program menggunakan Speech Recognition and Synthesis',
            'tipe_content' => 1,
            'prev_id' => 42,
            'next_id' => 44,
        ]);
        Content::create([ //44
            'course_id' => 3,
            'sub_course_id' => 16,
            'judul' => 'Bagaimana Program Komentar yang diucapkan dapat Bekerja',
            'tipe_content' => 1,
            'prev_id' => 43,
            'next_id' => 45,
        ]);
        Content::create([ //45
            'course_id' => 3,
            'sub_course_id' => 16,
            'judul' => 'Contoh Proyek',
            'tipe_content' => 1,
            'prev_id' => 44,
            'next_id' => 46,
        ]);
        Content::create([ //46
            'course_id' => 3,
            'sub_course_id' => 16,
            'judul' => 'Kalimat Lebih Rumit',
            'tipe_content' => 1,
            'prev_id' => 45,
            'next_id' => 47,
        ]);
        Content::create([ //47
            'course_id' => 3,
            'sub_course_id' => 16,
            'judul' => 'Demo Tanya Jawab',
            'tipe_content' => 1,
            'prev_id' => 46,
            'next_id' => 48,
        ]);
        Content::create([ //48
            'course_id' => 3,
            'sub_course_id' => 16,
            'judul' => 'Demo aplikasi Cuaca!',
            'tipe_content' => 1,
            'prev_id' => 47,
            'next_id' => 49,
        ]);
        Content::create([ //49
            'course_id' => 3,
            'sub_course_id' => 17,
            'judul' => 'Keunggulan Speech Recognition',
            'tipe_content' => 1,
            'prev_id' => 48,
            'next_id' => 50,
        ]);
        Content::create([ //50
            'course_id' => 3,
            'sub_course_id' => 17,
            'judul' => 'Bahaya dari Speech Recognition',
            'tipe_content' => 1,
            'prev_id' => 49,
            'next_id' => 51,
        ]);
        Content::create([ //51
            'course_id' => 3,
            'sub_course_id' => 17,
            'judul' => 'Bagaimana Speech Recognition Bekerja',
            'tipe_content' => 1,
            'prev_id' => 50,
            'next_id' => 52,
        ]);
        Content::create([ //52
            'course_id' => 3,
            'sub_course_id' => 18,
            'judul' => 'Fitur Lengkap Blok Speech Recognition',
            'tipe_content' => 1,
            'prev_id' => 51,
            'next_id' => 53,
        ]);
        Content::create([ //53
            'course_id' => 3,
            'sub_course_id' => 19,
            'judul' => 'Ide Projek',
            'tipe_content' => 1,
            'prev_id' => 52,
            'next_id' => 54,
        ]);
        Content::create([ //54
            'course_id' => 3,
            'sub_course_id' => 19,
            'judul' => 'Tambahan Sumber',
            'tipe_content' => 1,
            'prev_id' => 53,
            'next_id' => 55,
        ]);
        Content::create([ //55
            'course_id' => 3,
            'sub_course_id' => 19,
            'judul' => 'Belajar tentang Image Input!',
            'tipe_content' => 1,
            'prev_id' => 54,
            'next_id' => 56,
        ]);
        Content::create([ //56
            'id' => 56,
            'course_id' => 3,
            'sub_course_id' => 20,
            'judul' => 'Latihan',
            'tipe_content' => 2,
            'prev_id' => 55,
            'next_id' => 0,
        ]);

        //    Quiz time
        // Content::create([ //56
        //     'course_id' => 3,
        //     'sub_course_id' => 20,
        //     'judul' => 'Quiz Time!',
        //     'tipe_content' => 2,
        //     'prev_id' => 55,
        //     'next_id' => 0,
        // ]);

        Content::create([ //57
            'id' => 57,
            'course_id' => 4,
            'sub_course_id' => 21,
            'judul' => 'Pengenalan',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 58,
        ]);
        Content::create([ //58
            'course_id' => 4,
            'sub_course_id' => 21,
            'judul' => 'API yang akan dibutuhkan',
            'tipe_content' => 1,
            'prev_id' => 57,
            'next_id' => 59,
        ]);

        Content::create([ //59
            'course_id' => 4,
            'sub_course_id' => 22,
            'judul' => 'Blok sederhana untuk pengenalan gambar',
            'tipe_content' => 1,
            'prev_id' => 58,
            'next_id' => 60,
        ]);
        Content::create([ //60
            'course_id' => 4,
            'sub_course_id' => 22,
            'judul' => 'Menampilkan hasil pengenalan gambar',
            'tipe_content' => 1,
            'prev_id' => 59,
            'next_id' => 61,
        ]);
        Content::create([ //61
            'course_id' => 4,
            'sub_course_id' => 22,
            'judul' => 'Contoh program yang menggabungkan pengenalan gambar dan suara',
            'tipe_content' => 1,
            'prev_id' => 60,
            'next_id' => 62,
        ]);
        Content::create([ //62
            'course_id' => 4,
            'sub_course_id' => 23,
            'judul' => 'Blok pengenalan gambar level lanjut',
            'tipe_content' => 1,
            'prev_id' => 61,
            'next_id' => 63,
        ]);
        Content::create([ //63
            'course_id' => 4,
            'sub_course_id' => 23,
            'judul' => 'Mendapatkan properti dari sebuah gambar',
            'tipe_content' => 1,
            'prev_id' => 62,
            'next_id' => 64,
        ]);
        Content::create([ //64
            'course_id' => 4,
            'sub_course_id' => 23,
            'judul' => 'Cara menyediakan API key',
            'tipe_content' => 1,
            'prev_id' => 63,
            'next_id' => 65,
        ]);
        Content::create([ //65
            'course_id' => 4,
            'sub_course_id' => 24,
            'judul' => 'Pengenalan Gambar cocoknya untuk apa ?',
            'tipe_content' => 1,
            'prev_id' => 64,
            'next_id' => 66,
        ]);
        Content::create([ //66
            'course_id' => 4,
            'sub_course_id' => 24,
            'judul' => 'Apa bahaya dari pengenalan gambar ?',
            'tipe_content' => 1,
            'prev_id' => 65,
            'next_id' => 67,
        ]);
        Content::create([ //67
            'course_id' => 4,
            'sub_course_id' => 25,
            'judul' => 'Bagaimana cara Computer Vision bekerja',
            'tipe_content' => 1,
            'prev_id' => 66,
            'next_id' => 68,
        ]);
        Content::create([ //68
            'course_id' => 4,
            'sub_course_id' => 25,
            'judul' => 'Apa itu Video Recognition Services',
            'tipe_content' => 1,
            'prev_id' => 67,
            'next_id' => 69,
        ]);
        Content::create([ //69
            'course_id' => 4,
            'sub_course_id' => 26,
            'judul' => 'Ide Proyek menggunakan pengenalan Gambar',
            'tipe_content' => 1,
            'prev_id' => 68,
            'next_id' => 70,
        ]);

        Content::create([ //70
            'course_id' => 4,
            'sub_course_id' => 26,
            'judul' => 'Sumber Tambahan',
            'tipe_content' => 1,
            'prev_id' => 69,
            'next_id' => 71,
        ]);
        Content::create([ //71
            'course_id' => 4,
            'sub_course_id' => 26,
            'judul' => 'Bagaimana caranya kamu bisa mendapatkan Blok code tersebut ?',
            'tipe_content' => 1,
            'prev_id' => 70,
            'next_id' => 72,
        ]);
        Content::create([ //72
            'course_id' => 4,
            'sub_course_id' => 26,
            'judul' => 'Mari belajar tentang Machine Learning',
            'tipe_content' => 1,
            'prev_id' => 71,
            'next_id' => 73,
        ]);
        // Content::create([ //73
        //     'course_id' => 4,
        //     'sub_course_id' => 27,
        //     'judul' => 'Quiz Time',
        //     'tipe_content' => 2,
        //     'prev_id' => 72,
        //     'next_id' => 0,
        // ]);
        Content::create([ //74
            'id' => 74,
            'course_id' => 5,
            'sub_course_id' => 28,
            'judul' => 'Browser Compability',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 75,
        ]);

        Content::create([ //75
            'course_id' => 5,
            'sub_course_id' => 28,
            'judul' => 'Pengenalan',
            'tipe_content' => 1,
            'prev_id' => 74,
            'next_id' => 76,
        ]);
        Content::create([ //76
            'course_id' => 5,
            'sub_course_id' => 28,
            'judul' => 'Perhitungan aritmatika dengan kata dan kalimat',
            'tipe_content' => 1,
            'prev_id' => 75,
            'next_id' => 77,
        ]);
        Content::create([ //77
            'course_id' => 5,
            'sub_course_id' => 29,
            'judul' => 'Mengubah kata menjadi angka',
            'tipe_content' => 1,
            'prev_id' => 76,
            'next_id' => 78,
        ]);
        Content::create([ //78
            'course_id' => 5,
            'sub_course_id' => 29,
            'judul' => 'Menemukan kata terdekat ke dalam list feature kata',
            'tipe_content' => 1,
            'prev_id' => 77,
            'next_id' => 79,
        ]);
        Content::create([ //79
            'course_id' => 5,
            'sub_course_id' => 29,
            // finding the word half way between two other words
            'judul' => 'Mencari kata yang berada di tengah-tengah dua kata lainnya',
            'tipe_content' => 1,
            'prev_id' => 78,
            'next_id' => 80,
        ]);
        Content::create([ //80
            'course_id' => 5,
            'sub_course_id' => 29,
            // Using word embeddings to solve word analogy problems
            'judul' => 'Menggunakan word embeddings untuk menyelesaikan masalah analogi kata',
            'tipe_content' => 1,
            'prev_id' => 79,
            'next_id' => 81,
        ]);
        Content::create([ //81
            'course_id' => 5,
            'sub_course_id' => 29,
            // Finding all the 'closest' words
            'judul' => 'Mencari semua kata yang terdekat',
            'tipe_content' => 1,
            'prev_id' => 80,
            'next_id' => 82,
        ]);
        Content::create([ //82
            'course_id' => 5,
            'sub_course_id' => 29,
            // Finding how close some features are to a list of other features
            'judul' => 'Mencari seberapa dekat beberapa fitur ke dalam list fitur lainnya',
            'tipe_content' => 1,
            'prev_id' => 81,
            'next_id' => 83,
        ]);
        Content::create([ //83
            'course_id' => 5,
            'sub_course_id' => 29,
            // Sentence embeddings
            'judul' => 'Kalimat embeddings',
            'tipe_content' => 1,
            'prev_id' => 82,
            'next_id' => 84,
        ]);
        Content::create([ //84
            'course_id' => 5,
            'sub_course_id' => 30,
            // AI-aided search in the Snap! manual and the AI guide
            'judul' => 'Pencarian AI dalam manual Snap! dan panduan AI',
            'tipe_content' => 1,
            'prev_id' => 83,
            'next_id' => 85,
        ]);
        Content::create([ //85
            'course_id' => 5,
            'sub_course_id' => 30,
            // Drawing word embeddings
            'judul' => 'Menggambar word embeddings',
            'tipe_content' => 1,
            'prev_id' => 84,
            'next_id' => 86,
        ]);
        Content::create([ //86
            'course_id' => 5,
            'sub_course_id' => 30,
            // Mapping 300 dimensional points to two-dimensional points
            'judul' => 'Memetakan titik 300 dimensi ke titik dua dimensi',
            'tipe_content' => 1,
            'prev_id' => 85,
            'next_id' => 87,
        ]);
        Content::create([ //87
            'course_id' => 5,
            'sub_course_id' => 30,
            // Generating Projector Files to visualize embeddings
            'judul' => 'Menghasilkan File Projector untuk memvisualisasikan embeddings',
            'tipe_content' => 1,
            'prev_id' => 86,
            'next_id' => 88,
        ]);

        Content::create([ //88
            'course_id' => 5,
            'sub_course_id' => 30,
            // Word embeddings can do translations
            'judul' => 'Word embeddings dapat melakukan terjemahan',
            'tipe_content' => 1,
            'prev_id' => 87,
            'next_id' => 89,
        ]);
        Content::create([ //89
            'course_id' => 5,
            'sub_course_id' => 30,
            // A 'Guess My Word' game using word embeddings
            'judul' => 'Permainan "Tebak Kata Saya" menggunakan word embeddings',
            'tipe_content' => 1,
            'prev_id' => 88,
            'next_id' => 90,
        ]);
        Content::create([ //90
            'course_id' => 5,
            'sub_course_id' => 30,
            // Question answering
            'judul' => 'Question Answering',
            'tipe_content' => 1,
            'prev_id' => 89,
            'next_id' => 91,
        ]);
        Content::create([ //91
            'course_id' => 5,
            'sub_course_id' => 31,
            // Getting responses from GPT-3, Jurassic 1, or Cohere
            'judul' => 'Mendapatkan respon dari GPT-3, Jurassic 1, atau Cohere',
            'tipe_content' => 1,
            'prev_id' => 90,
            'next_id' => 92,
        ]);
        Content::create([ //92
            'course_id' => 5,
            'sub_course_id' => 31,
            // Having a conversation with GPT-3, Jurassic 1, or Cohere
            'judul' => 'Berbicara dengan GPT-3, Jurassic 1, atau Cohere',
            'tipe_content' => 1,
            'prev_id' => 91,
            'next_id' => 93,
        ]);
        Content::create([ //93
            'course_id' => 5,
            'sub_course_id' => 31,
            // Generating debates
            'judul' => 'Menghasilkan debat',
            'tipe_content' => 1,
            'prev_id' => 92,
            'next_id' => 94,
        ]);

        Content::create([ //94
            'course_id' => 5,
            'sub_course_id' => 31,
            // Generating turtle commands
            'judul' => 'Menghasilkan perintah turtle',
            'tipe_content' => 1,
            'prev_id' => 93,
            'next_id' => 95,
        ]);
        Content::create([ //95
            'course_id' => 5,
            'sub_course_id' => 31,
            // Using words to generate costumes using DALLE-2
            'judul' => 'Menggunakan kata untuk menghasilkan kostum menggunakan DALLE-2',
            'tipe_content' => 1,
            'prev_id' => 94,
            'next_id' => 96,
        ]);
        Content::create([ //96
            'course_id' => 5,
            'sub_course_id' => 31,
            // Using Stable Diffusion to generate a costume
            'judul' => 'Menggunakan Stable Diffusion untuk menghasilkan kostum',
            'tipe_content' => 1,
            'prev_id' => 95,
            'next_id' => 97,
        ]);
        Content::create([ //97
            'course_id' => 5,
            'sub_course_id' => 31,
            // A generic text-to-image block
            'judul' => 'Blok teks ke gambar generik',
            'tipe_content' => 1,
            'prev_id' => 96,
            'next_id' => 98,
        ]);
        Content::create([ //98
            'course_id' => 5,
            'sub_course_id' => 31,
            // Using DALL-E-2 to create variants of a costume
            'judul' => 'Menggunakan DALL-E-2 untuk membuat varian kostum',
            'tipe_content' => 1,
            'prev_id' => 97,
            'next_id' => 99,
        ]);
        Content::create([ //99
            'course_id' => 5,
            'sub_course_id' => 31,
            // Using DALL-E-2 to edit a costume
            'judul' => 'Menggunakan DALL-E-2 untuk mengedit kostum',
            'tipe_content' => 1,
            'prev_id' => 98,
            'next_id' => 100,
        ]);
        Content::create([ //100
            'course_id' => 5,
            'sub_course_id' => 31,
            // Using language models on Hugging Face
            'judul' => 'Menggunakan model bahasa di Hugging Face',
            'tipe_content' => 1,
            'prev_id' => 99,
            'next_id' => 101,
        ]);
        Content::create([ //101
            'course_id' => 5,
            'sub_course_id' => 31,
            // Generating clues for the Codenames board game
            'judul' => 'Menghasilkan petunjuk untuk permainan papan Codenames',
            'tipe_content' => 1,
            'prev_id' => 100,
            'next_id' => 102,
        ]);
        Content::create([ //102
            'course_id' => 5,
            'sub_course_id' => 32,
            // Benefits and risks using word embeddings
            'judul' => 'Manfaat dan risiko menggunakan word embeddings',
            'tipe_content' => 1,
            'prev_id' => 101,
            'next_id' => 103,
        ]);
        Content::create([ //103
            'course_id' => 5,
            'sub_course_id' => 33,
            // How do word embeddings work?
            'judul' => 'Bagaimana word embeddings bekerja?',
            'tipe_content' => 1,
            'prev_id' => 102,
            'next_id' => 104,
        ]);
        Content::create([ //104
            'course_id' => 5,
            'sub_course_id' => 34,
            // A sample project using word embeddings for translation
            'judul' => 'Proyek contoh menggunakan word embeddings untuk terjemahan',
            'tipe_content' => 1,
            'prev_id' => 103,
            'next_id' => 105,
        ]);
        Content::create([ //105
            'course_id' => 5,
            'sub_course_id' => 34,
            // How does translation using word embeddings work?
            'judul' => 'Bagaimana terjemahan menggunakan word embeddings bekerja?',
            'tipe_content' => 1,
            'prev_id' => 104,
            'next_id' => 106,
        ]);
        Content::create([ //106
            'course_id' => 5,
            'sub_course_id' => 34,
            // Image embeddings are possible as well
            'judul' => 'Embedding gambar juga memungkinkan',
            'tipe_content' => 1,
            'prev_id' => 105,
            'next_id' => 107,
        ]);
        Content::create([ //107
            'course_id' => 5,
            'sub_course_id' => 34,
            // Possible project ideas for Natural Language Processing
            'judul' => 'Ide proyek yang mungkin untuk Pemrosesan Bahasa Alami',
            'tipe_content' => 1,
            'prev_id' => 106,
            'next_id' => 108,
        ]);
        Content::create([ //108
            'course_id' => 5,
            'sub_course_id' => 34,
            // Future directions for this chapter
            'judul' => 'Arah masa depan untuk materi ini',
            'tipe_content' => 1,
            'prev_id' => 107,
            'next_id' => 109,
        ]);
        Content::create([ //109
            'course_id' => 5,
            'sub_course_id' => 34,
            // Additional resources
            'judul' => 'Sumber tambahan',
            'tipe_content' => 1,
            'prev_id' => 108,
            'next_id' => 110,
        ]);
        Content::create([ //110
            'course_id' => 5,
            'sub_course_id' => 34,
            // Where to get these blocks to use in your projects
            'judul' => 'Dimana mendapatkan blok ini untuk digunakan dalam proyek Anda',
            'tipe_content' => 1,
            'prev_id' => 109,
            'next_id' => 111,
        ]);
        Content::create([ //111
            'course_id' => 5,
            'sub_course_id' => 34,
            // Learn about making and training neural nets
            'judul' => 'Pelajari tentang membuat dan melatih jaringan saraf',
            'tipe_content' => 1,
            'prev_id' => 110,
            'next_id' => 112,
        ]);
        // Content::create([ //112
        //     'course_id' => 5,
        //     'sub_course_id' => 35,
        //     'judul' => 'Quiz',
        //     'tipe_content' => 2,
        //     'prev_id' => 111,
        //     'next_id' => 0,
        // ]);





        // END OF CONTENT CHAPTER 4 //

        //

        //-----------------------CONTENT SR---------------------//
        /*
        Content::create([ //19
            'course_id' => 2,
            'sub_course_id' => 7,
            'judul' => 'Apa itu Speech Recognition?',
            'tipe_content' => 1,
            'prev_id' => 0,
            'next_id' => 20,
        ]);

        Content::create([ //20
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Speech Recognition Sederhana',
            'tipe_content' => 1,
            'prev_id' => 19,
            'next_id' => 21,
        ]);

        Content::create([ //21
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Error dalam program Speech Recognition',
            'tipe_content' => 1,
            'prev_id' => 20,
            'next_id' => 22,
        ]);

        Content::create([ //22
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Latihan',
            'tipe_content' => 1,
            'prev_id' => 21,
            'next_id' => 23,
        ]);

        Content::create([ //23
            'course_id' => 2,
            'sub_course_id' => 8,
            'judul' => 'Asah Pengetahuan 1',
            'tipe_content' => 2,
            'prev_id' => 22,
            'next_id' => 24,
        ]);

        Content::create([ //24
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Contoh Program Speech Recognition dan Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 23,
            'next_id' => 25,
        ]);

        Content::create([ //25
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Bagaimana Spoken Command Program Bekerja?',
            'tipe_content' => 1,
            'prev_id' => 24,
            'next_id' => 26,
        ]);

        Content::create([ //26
            'course_id' => 2,
            'sub_course_id' => 9,
            'judul' => 'Latihan',
            'tipe_content' => 1,
            'prev_id' => 25,
            'next_id' => 27,
        ]);

        Content::create([ //27
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Melibatkan pembuatan kalimat menggunakan konsep part of speech',
            'tipe_content' => 1,
            'prev_id' => 26,
            'next_id' => 28,
        ]);

        Content::create([ //28
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Generator kalimat (atau cerita) yang lebih canggih',
            'tipe_content' => 1,
            'prev_id' => 27,
            'next_id' => 29,
        ]);

        Content::create([ //29
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Latihan',
            'tipe_content' => 1,
            'prev_id' => 28,
            'next_id' => 30,
        ]);

        Content::create([ //30
            'course_id' => 2,
            'sub_course_id' => 10,
            'judul' => 'Asah Pengetahuan 2',
            'tipe_content' => 2,
            'prev_id' => 29,
            'next_id' => 31,
        ]);

        Content::create([ //31
            'course_id' => 2,
            'sub_course_id' => 11,
            'judul' => 'Contoh Demo Program Menjawab Pertanyaan',
            'tipe_content' => 1,
            'prev_id' => 30,
            'next_id' => 32,
        ]);

        Content::create([ //32
            'course_id' => 2,
            'sub_course_id' => 12,
            'judul' => 'Fitur Lengkap Blok Speech Recognition',
            'tipe_content' => 1,
            'prev_id' => 31,
            'next_id' => 33,
        ]);

        Content::create([ //33
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Ide Proyek dengan Speech Synthesis',
            'tipe_content' => 1,
            'prev_id' => 32,
            'next_id' => 34,
        ]);

        Content::create([ //34
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Bagaimana Speech Recognition Menjadi Sangat Berguna?',
            'tipe_content' => 1,
            'prev_id' => 33,
            'next_id' => 35,
        ]);

        Content::create([ //35
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Apakah Speech recognition dapat disalahgunakan?',
            'tipe_content' => 1,
            'prev_id' => 34,
            'next_id' => 36,
        ]);

        Content::create([ //36
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Evaluasi',
            'tipe_content' => 3,
            'prev_id' => 35,
            'next_id' => 37,
        ]);

        Content::create([ //37
            'course_id' => 2,
            'sub_course_id' => 13,
            'judul' => 'Congratulations!',
            'tipe_content' => 4,
            'prev_id' => 36,
            'next_id' => 0,
        ]);
*/
        //-----------------------MATERIAL SS ---------------------//

        Material::create([
            'content_id' => 1,
            'isi' => '<p>Artificial Intelligence (AI) atau dalam bahasa Indonesia adalah kecerdasan buatan merupakan istilah yang digunakan untuk menggambarkan produk di mana mesin atau sistem melakukan sesuatu yang biasanya membutuhkan kecerdasan manusia (Lane, 2021).</p><br><p>Banyak teknik untuk membuat sebuah mesin atau sistem dapat memiliki kecerdasan manusia, salah satu teknik paling popular dalam AI adalah machine learning (ML). ML berguna untuk tugas-tugas dengan langkah-langkah yang akan memakan waktu terlalu lama dan rumit untuk ditulis, oleh karena itu ML memberikan kemudahan untuk melakukan tugas tersebut dengan cara menunjukan contoh tugas pada mesin atau sistem secara berulang kali hingga menemukan pola tugas tersebut.</p><br><p>Apakah kalian pernah menggunakan fitur pada google translate yang dapat mengeluarkan suara sesuai dengan kalimat yang akan diterjemahkan ataupun hasil terjemahan?</p><br><img class="object-contain w-96 mx-auto" src="/res/img/course/ss-1.png" alt=""><br><p>Sistem tersebut adalah gambaran produk AI yang dibangun dengan machine learning agar dapat mengubah teks menjadi suara, saat ini hal tersebut disebut speech synthesis.</p><br><p>Speech Synthesis merupakan salah satu bentuk machine learning yang biasa dikenal dengan text-to-speech (TTS). Speech Synthesis adalah teknologi komprehensif yang melibatkan banyak disiplin ilmu seperti akustik, linguistik, pemrosesan sinyal digital, dan statistik yang bertujuan untuk mengubah informasi teks menjadi ucapan secara real time.</p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 2,
            'isi' => '<p>Sebelum membahas teknis dibalik speech synthesis, mari kita lihat bagaimana speech synthesis dapat digunakan. Dimulai dengan blok program paling sederhana untuk mengeluarkan suara (berbicara). </p><ul class="list-inside list-disc"><li>Klik snap! dibawah</li><li>Klik blok Speak untuk melihat apakah itu bekerja?</li><li>Cobalah untuk mengubah bahasa dan yang akan diucapkan oleh blok Speak!</li></ul><br><figure class = "snap-iframe" id = "simple speak block" container_style = "width: 560px; height: 150px"></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=simple%20speak%20block&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><p class="font-semibold mt-4">Catatan:</p><ul class="list-inside list-disc"><li>Blok perintah set default language digunakan untuk mengubah bahasa yang akan digunakan.</li><li>Untuk mengubah bahasa hanya perlu memasukan nama bahasa ataupun menggunakan kode bahasa, seperti ID yang digunakan untuk bahasa Indonesia. <a class="text-blue-400" href="https://en.wikipedia.org/wiki/IETF_language_tag" target="_blank">(Lihat kode bahasa lainnya)</a></li></ul>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 3,
            'isi' => '<p>Kalau kalian tahu speech synthesis bisa melakukan lebih dari sekedar mengucapkan setiap kata hanya dalam sebuah kalimat loh.</p><p>Speech synthesis berusaha menghasilkan pengucapan secara natural, seperti intonasi, nada, tekanan, dan ritme. Selain itu, pengucapan pertanyaan dan kalimat yang deklaratif akan memiliki perbedaan. </p><p>Contoh berikut adalah perbedaan bagaimana pengucapan kalimat yang dibuat per kata dan kalimat utuh. </p><br><figure class="snap-iframe" id="separate words" container_style="width: 560px; height: 200px"></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=separate%20words&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><p>Kalian bisa mencobanya dengan mengubah bentuk pertanyaan menjadi kalimat deklaratif, apakah ada perbedaan dalam pengucapannya?</p> ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 4,
            'isi' => '<p>Selain dapat mengucapkan kalimat utuh, speech synthesis dapat berbicara persis seperti manusia dalam pengucapan angka, simbol, bahkan sampai format tanggal</p><p>Berikut contoh bagaimana speech synthesis dapat mengucapkan angka dan format tanggal, Cobalah!</p><br><figure class="snap-iframe" id="numbers signs" container_style="width: 560px; height: 132px" caption=""> </figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=numbers%20signs&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
            <p>Bagaimana apakah sudah terbayang akan membuat sebuah produk AI menggunakan speech synthesis?</p> ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 5,
            'isi' => '<p>Cobalah edit snap! di bawah untuk melihat bagaimana angka yang berbeda dan simbol khusus diucapkan! Lihat juga ketika kita mengganti bahasa, apakah akan berbeda?</p><br><figure class="snap-iframe" id="numbers signs" container_style="width: 560px; height: 132px" caption=""> </figure> <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=numbers%20signs&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 7,
            'isi' => '<p>Setelah mempelajari bagaimana speech synthesis secara sederhana, kita akan memahami efek suara pada speech synthesis. Contohnya kita ingin membuat komputer untuk berbicara, kemudian diinterupsi oleh bel pintu, dan ada respon setelah bel pintu berbunyi, program tersebut dapat dilihat pada contoh berikut</p><br><figure class="snap-iframe" id="doorbell problem" container_style="width: 560px; height: 132px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=doorbell%20problem&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Bagaimana apakah ada masalah pada contoh tersebut?</p> <p>Ya, Masalahnya adalah bel pintu berbunyi bersamaan dengan pengucapan kalimat pertama. Hal tersebut terjadi karena block Speak memberitahu browser untuk mulai berbicara dan block lainnya sejajar dengan block speak sehingga terjadi masalah, contoh disini adalah block <span class="bg-fuchsia-500 px-2 rounded-md text-white">play sound</span>. </p> <br><p>Untuk mengatasi masalah tersebut yaitu dengan membunyikan bel pintu setelah pengucapan kalimat pertama selesai. Untuk itu, kita memerlukan blok yang sedikit lebih kompleks yang dapat menerima tindakan yang harus dilakukan setelah blok speak dijalankan. Berikut yang harus dilakukan agar hal tersebut dapat diperbaiki :</p><br><figure class="snap-iframe" id="doorbell fix" container_style="width: 560px; height: 132px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=doorbell%20fix&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Terlihat perbedaan bukan? Pada kasus ini kita menambahkan perintah <span class="bg-fuchsia-500 px-2 rounded-md text-white">then</span> setelah blok speak kalimat pertama dan dilanjutkan dengan pemutaran efek suara bel pintu yang ditambahkan <span class="bg-fuchsia-500 px-2 rounded-md text-white">until done</span> dan diakhiri dengan blok <span class="bg-fuchsia-500 px-2 rounded-md text-white">speak</span> untuk mengucapkan kalimat kedua.</p><br><p>Catatan:</p>
            <p>Kemampuan untuk mengungkapkan apa yang harus terjadi setelah selesai berbicara adalah kemampuan yang berguna. Misalnya, program mungkin berbicara beberapa penjelasan dan kemudian melakukan sesuatu di layar. Dalam beberapa contoh di chapter selanjutnya program akan mendengarkan suara yang diucapkan oleh kita setelah program selesai bicara.</p><br><p>Mari kita lanjutkan ke materi selanjutnya yaitu mengontrol speech synthesis!</p>',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 8,
            'isi' => '<p>Dalam kehidupan sehari-hari seseorang dapat berbicara secara lambat atau cepat, dalam nada rendah atau tinggi, dengan suara pelan atau keras, dan banyak lagi. Setiap orang pastinya memiliki suara dan aksen yang berbeda.</p><br><p>Untuk mencerminkan kemampuan tersebut, kita dapat menggunakan blok yang lebih kompleks. Cobalah contoh berikut!</p><br><figure class="snap-iframe" id="rate pitch volume" container_style="width: 560px; height: 132px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=rate%20pitch%20volume&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Pada contoh diatas, blok memiliki beberapa parameter seperti <span class="bg-fuchsia-500 px-2 rounded-md text-white">with pitch</span> , <span class="bg-fuchsia-500 px-2 rounded-md text-white">with rate</span> , <span class="bg-fuchsia-500 px-2 rounded-md text-white">with voice</span> , dan <span class="bg-fuchsia-500 px-2 rounded-md text-white">with volume</span> yang dapat diisi dengan nilai. Nilai 1 menandakan normal, jika nilai dibawah 1 seperti nilai pecahan menandakan nada rendah, laju lambat, atau volume rendah. Kebalikannya jika nilai di atas 1 menandakan nada tinggi, laju cepat, atau volume tinggi.</p><br><p>Catatan : Perhatikan bahwa ini tergantung pada suara dan browser yang digunakan, beberapa parameter tersebut mungkin akan diabaikan</p>',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 9,
            'isi' => '<p>Pada contoh sebelumnya terdapat parameter  <span class="font-bold text-fuchsia-700">in language</span>  dalam blok speak, parameter tersebut dapat diisi dengan nama bahasa yang akan digunakan atau dengan kode bahasa, seperti ID yang digunakan untuk bahasa Indonesia. <a class="text-blue-400" href="https://en.wikipedia.org/wiki/IETF_language_tag" target="_blank">(Lihat kode bahasa lainnya)</a></p><br><p>Pemilihan jenis suara <span class="font-bold text-fuchsia-700">with voice</span> yang tersedia tergantung pada browser dan sistem operasi komputer yang digunakan. Untuk melihat daftar suara dapat mengklik <span class="font-bold text-fuchsia-700">get voice names</span> dan gunakan nomor suara yang ada di daftar pada parameter <span class="font-bold text-fuchsia-700">with voice</span> . Kita juga dapat menggunakan <span class="font-bold text-fuchsia-700">voice that matches</span> untuk menemukan suara yang cocok dengan pencarian kita seperti pada contoh berikut</p><br><figure class="snap-iframe" id="voices" container_style="width: 560px; height: 600px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=voices&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Sebuah suara lebih dari sekedar suara. Dengarkan contoh di bawah ini dalam mengucapkan tanggal. Kedua blok tersebut menghasilkan pengucapan yang berbeda berdasarkan bahasa inggris yang digunakan, blok pertama menggunakan bahasa inggris UK dan blok kedua menggunakan bahasa inggris US.</p><br><figure class="snap-iframe" id="dates" container_style="width: 560px; height: 700px" caption=""></figure> <p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=dates&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 10,
            'isi' => '<p>Pada snap berikut, ubah nilai parameter ke angka yang kurang dari 1 dan kemudian lebih besar dari 1. Lakukan hal yang sama untuk nada (<span class="font-bold text-fuchsia-700">with pitch</span>). Cobalah suara (voice) yang berbeda. Kita dapat melihat daftar suara yang tersedia di browser dengan klik blok <span class="font-bold text-fuchsia-700">get voice name</span>. Beberapa dari pilihan tersebut dimaksudkan untuk berbicara menggunakan bahasa lain.</p><br><figure class="snap-iframe" id="rate pitch volume" container_style="width: 560px; height: 132px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=rate%20pitch%20volume&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Sampai sini kita sudah memahami bagaimana mengontrol suara yang dihasilkan oleh speech synthesis, menyenangkan bukan?</p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 12,
            'isi' => '<p>Sangat menarik untuk mengeksplorasi bagaimana suara yang berbeda dalam mengucapkan yang bukan termasuk kata seperti "grrrrrrrrrrrrr". Dengarkan bagaimana suaranya untuk setiap suara dan kemudian jelajahi yang bukan termasuk kata lainnya (misal, hmmmm).</p><br><figure class="snap-iframe" id="grrrrrrr" full_screen="true" container_style="width: 560px; height: 480px" caption=""></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=grrrrrrr" class="font-bold text-primary" target="_blank">klik disini!</a></p><br><p>Bisakah kalian membuatnya menggeram dengan menurunkan nada dan kecepatannya? Cobalah pada program di atas!</p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 13,
            'isi' => '<p>Contoh program Speech Synthesis berikut ini menggunakan nilai random untuk <span class="font-bold text-fuchsia-700">rate</span>, <span class="font-bold text-fuchsia-700">pitch</span>, dan <span class="font-bold text-fuchsia-700">voice</span>. Ketika kita mengklik angka pada gambar, angka random diucapkan dengan suara random (dan karenanya bahasa juga random) serta pitch dan rate random.</p> <br><p>Burung beo mengulangi apa yang didengarnya (Speech Recognition). Mendengar ucapan kita berulang-ulang dengan suara aneh dengan pitch dan rate random sehingga dapat menghibur.</p><br><figure class="snap-iframe" id="speak randomly" full_screen="true" container_style="width: 560px; height: 480px" caption="Click bendera hijau untuk mendengarkan bebicara secara random"></figure><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=speak%20randomly" class="font-bold text-primary" target="_blank">klik disini!</a></p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 14,
            'isi' => '<p>Pada bagian ini kamu akan diminta untuk merancang ide proyek yang memanfaatkan teknologi <i>Speech Synthesis</i>. </p>
<br>
<p>Berikut ini adalah contoh ide proyek yang biasa digunakan dengan teknologi tersebut. </p>
            <br>
            <ol class="list-alpha list-outside">
              <li>Mintalah sprite bermain di mana setiap sprite berbicara dengan suara yang berbeda.</li>
              <li>Buat jam bicara atau kalkulator.</li>
              <li>Buat permainan mengeja di mana kata-kata yang akan dieja diucapkan.</li>
            </ol>
<br>
<p>Buatlah ide proyek kamu sendiri dan ceritakan bagaimana proyek tersebut diimplementasikan dengan Snap Programming. Gunakan chatbot untuk membantu kamu merumuskan ide tersebut. Untuk berbicara dengan chatbot, tekan logo di bawah kanan kemudian ketik "Ide Proyek Speech Synthesis". </p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 15,
            'isi' => '<p>Tahukah kamu? bahwa speech synthesis adalah cara yang baik bagi perangkat lunak untuk berkomunikasi dengan orang-orang tuna netra, seperti jam bicara atau robot tanpa tampilan. </p><br>
            <p>Selain itu speech synthesis dapat digunakan ketika mata seseorang perlu memperhatikan lain seperti pilot yang menerbangkan pesawat atau ahli bedah selam operasi pasien.</p><br>
            <p>Speech synthesis seringkali menjadi cara terbaik untuk berkomunikasi dengan anak-anak atau orang dewasa yang belum belajar membaca. Bahkan speech synthesis dapat memberikan cara bagi orang-orang yang secara fisik tidak dapat berbicara dapat berkomunikasi dengan orang lain, karena hal tersebut menciptakan percakapan yang lebih alami, ramah, dan menyenangkan daripada menggunakan monitor, keyboard, mouse, dan alat lainnya.</p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 16,
            'isi' => '<p>Jawabanya Ya, karena saat teknologi semakin maju, hal tersebut memungkinkan pekerjaan orang lain tergantikan dengan teknologi. Kekhawatiran yang lebih serius adalah ketika pada generasi berikutnya dari speech synthesis dapat membodohi orang agar berpikir bahwa seseorang mengatakan sesuatu yang padahal tidak mereka katakan. Hal tersebut sangat mengkhawatirkan dalam kombinasi dengan teknologi yang dapat mengubah ekspresi emosional dan sinkronisasi bibir pada video.</p>',
            'xp' => 10
        ]);

        //-----------------------MATERIAL SR ---------------------//

        // MATERIAL CHAPTER 4 //

        Material::create([
            'content_id' => 19,
            'isi' => '<p>Sebelum mulai pembelajaran, yuk simak video di bawah ini terlebih dahulu!</p>
            <br>
            <center> 
                <iframe width="560" height="315" src="https://www.youtube.com/embed/_rdINNHLYaQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>
            <br>
            <p>
                Dari video di atas bisa disimpulkan bahwa Machine Learning adalah salah satu cara 
                yang bisa digunakan untuk menyelesaikan suatu permasalahan dalam banyak bidang dan pastinya meningkatkan kualitas kehidupan.
            </p><br>
            <p>
                Eits, tapi Kamu udah tahu apa itu Machine Learning? Tapi sebelumnya, lihat gambar di bawah ini dulu yuk!
            </p><br>
            <center>
                <img src="/assets/img/googlephoto.png" width="70%">
            </center><br>
            <p> Kamu pasti sangat familiar dengan gambar di atas bukan? </p><br>
            <p>
                Yap! Betul sekali, itu adalah Google Assistant dan penelusuran Google dengan gambar yang sering dtemui pada smartphone kamu!
            </p><br>
            <p> Sekarang, apakah Kamu pernah penasaran bagaimana kedua hal itu bekerja?  </p><br>
            <p>
                Google bekerja memanfaatkan metode Machine Learning. Komputer sebagai mesin akan belajar untuk mengenali pola dari lingkungan. Poses belajar dilakukan secara mandiri. Programer tidak akan menuliskan program yang panjang untuk agar komputer bisa melakukan pekerjaannya. Sehingga, kita tidak perlu menuliskan kode program yang panjang untuk mendapatkan hasil dari beberapa contoh tersebut. 
            </p><br>
            <p> Hmm, menarik bukan? Di bawah ini kamu bisa menonton penjelasan singkat tentang Machine Learning </p><br>
            <center>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/-DEL6SVRPw0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center><br>
            <p>Teknologi Machine Learning (ML) adalah mesin yang dikembangkan untuk bisa belajar dengan sendirinya tanpa arahan dari penggunanya. ML akan mempelajari data yang ada dan data yang ia peroleh sehingga bisa melakukan tugas tertentu. Tugas yang dapat dilakukan oleh ML pun sangat beragam, tergantung dari apa yang ia pelajari.</p><br>
            <p> Pada saat komputer belajar, Machine Learning harus mengeneralisasi perilaku dari data yang ada untuk menghasilkan insight yang berguna dalam suatu kasus. Pertanyaannya, bagaimana komputer melakukan hal tersebut?</p><br>
            <p>Yap! Dengan adanya Data Training dan Data Testing. Kedua hal itu sangat penting dalam ML, karena data merupakan kebutuhan utama yang dapat memproses suatu program ML sesuai dengan rancangan nya. Apa itu?</p><br>
            
            <section class="py-4">
                <div class="row">
                    <br><br>
                    <div class="col-lg-5">
                        <img src="/assets/img/aset1.png" width="40%">
                    </div>
                    <div class="col-lg-7">
                        <br>
                        <p>
                            <b>Training set</b> adalah bagian dataset yang dilatih untuk membuat prediksi atau menjalankan fungsi dari algoritma ML sesuai tujuannya. Training dilakukan untuk memberi tahu mesin akan dari apa yang sudah mereka pelajari.
                        </p><br>
                        <p>
                            <b>Test set</b> Test set adalah bagian dataset yang dtes untuk melihat keakuratan dengan menggunakan "confidence scores" yaitu angka antara 0 dan 1 yang menunjukkan kemungkinan keluaran model ML yang benar.
                        </p>
                    /div>
                </div>
            </section> ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 20,
            'isi' => '<center> <img src="/assets/img/aset2.png" width="30%"> </center>
            <br>
            <p>
                Pada chapter ini, kamu bisa bereksperimen dengan Machine Learning menggunakan Snap!
                Kamu akan belajar jenis-jenis input yang dapat dengan mudah dibedakan oleh mesin dan mana yang membingungkan.
            </p><br>
            <p style="font-size: 18px">
                Pada Chapter ini juga, label untuk input sudah disediakan. Mesin akan mempelajari label-label tersebut melalui proses training.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 21,
            'isi' => '<p> Seperti yang sudah dibahas sebelumnya, Training set adalah bagian dataset yang dilatih untuk membuat prediksi atau menjalankan fungsi dari algoritma ML sesuai tujuannya. Training dilakukan untuk memberi tahu mesin akan dari apa yang sudah mereka pelajari.</p><br>
            <p>
                Di sini, disediakan halaman Training dengan button “Save Your Training” seperti di bawah ini, yang bisa kamu pakai untuk menyimpan file training kamu!
            </p><br>
            <center> 
                <img src="/assets/img/aset/aset3.png" width="50%">
            </center>
            <br><br>
            <p> Untuk load training yang telah disimpan, kamu dapat melakukannya dengan 2 cara: </p>
            <p><b> 1.	Load file dari sistem penyimpanan lokal </b></p>
            <p><b> 2.	Load file dari web dengan memasukkan URL untuk mengaksesnya </b></p>
            <br>
            <p>
                Ayo coba dengan program di bawah ini!
            </p><br>
            <iframe src="https://ecraft2learn.github.io/ai/snap/snap.html?project=load%20training&editMode" title="eCraft2Learn" width=”560” height=”132”></iframe><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=load%20training&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 22,
            'isi' => '<p>Seperti judulnya, pada bagian ini kamu akan bereksperimen blok untuk training gambar dengan 
            menggunakan kamera. Ada beberapa blok di bawah ini yang bisa kamu coba untuk memahami konsep train gambar. </p>
            <p>Ayo lakukan eksperimen!</p><br>
            <iframe src="https://ecraft2learn.github.io/ai/snap/snap.html?project=camera%20train" title="eCraft2Learn" width=”560” height=”132”></iframe><p class="my-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=camera%20train" class="font-bold text-primary" target="_blank">klik disini!</a></p>
            <br>
            <center><img src="/assets/img/blocks/blok-1.png" alt="ecraft2learn" width="30%"></center>
            <p>Blok di atas adalah untuk membuka tab di mana kamu bisa train sistem dengan memberi label menggunakan kameramu. Pada argumen pertama, kamu bisa lihat list dari label-label yang sudah ditentukan. Masing-masing label mempunyai bucket untuk menampung data gambar.
            </p>
            <p>Pada contoh berikut ini, terdapat dua label, yaitu “leaning to the left” dan “leaning to the right”. Kamu bisa mengedit list untuk mengenali ekspresi, wajah orang, atau objek yang berbeda di depan kamera, dan masih banyak lagi. 
            </p>
            <p>Blok tersebut hanya membutuhkan argument pertama yang memberi tahu bucket dari suatu label. Hal itu memiliki tiga argument opsional tambahan, yaitu:
            </p><br>
            <center> 
                <img src="/assets/img/aset/aset4.png" alt="ecraft2learn" width="80%" class="img-fluid rounded">
            </center>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 23,
            'isi' => '<p> Sprite adalah gambar atau objek yang bisa diprogram. Pada Snap! sprite dapat di costumes sesuai keinginan kita, baik berbentuk gambar ataupun foto. Berikut adalah tampilannya:
            </p>
            <center> 
                <img src="/assets/img/aset/aset5.png" alt="ecraft2learn" width="25%" class="img-fluid rounded">
            </center><br>

            <p> Di bawah ini, kamu bisa mencoba blok untuk train sprite yang telah kamu buat </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=cats%20and%20dogs#using-costumes" target=”_blank”>
                    <img src="/assets/img/blocks/blok3.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>
            <p>Dengan program tersebut, kamu dapat bereksperimen dengan beberapa blok, yaitu: </p>

            <p>
                Blok <img src="/assets/img/blocks/blok-2.png" alt="ecraft2learn" width="30%">
                untuk mengirimkan semua sprite kamu ke tab training
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-3.png" alt="ecraft2learn" width="30%">
                untuk train gambar-gambar kamu
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-4.png" alt="ecraft2learn" width="30%">
                untuk mendapatkan nilai confidences dari sprite 
            </p><br>

            <hr>
            
            <p class="text-orange">
                <b><i>Note:</i></b>
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-3.png" alt="ecraft2learn" width="30%">
                adalah versi sederhana dari blok <img src="/assets/img/blocks/blok-1.png" alt="ecraft2learn" width="30%">
                untuk menghindari penggunaan kamera saat training data.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 24,
            'isi' => '<p>Di sini, kamu dapat mencoba program untuk mengenali gambar tanpa training.
            Gimana caranya? Yaitu dengan menggunakan model pembelajaran mesin terlatih bernama MobileNet. </p>
            <center>
                <a href="https://arxiv.org/abs/1704.04861">
                    <button type="button" class="btn btn-primary btn-lg">MobileNet</button>
                </a>
            </center><br>
            <p>
                Model ini berjalan di browser kamu dan tidak menghubungi layanan cloud apapun. Meskipun jika memilih di antara 1000 label, itu tidak akan sebaik layanan cloud. MobileNet berguna untuk masalah dalam mendaftar untuk kunci API, atau akses Internet terbatas atau hilang, atau menyangkut privasi. Namun, itu bergantung pada perangkat Kamu yang memiliki GPU untuk berjalan pada kecepatan yang wajar.
            </p>

            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=mobilenet#using-costumes" target=”_blank”>
                    <img src="/assets/img/blocks/blok4.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>

            <hr>
            
            <p class="text-orange">
                <b><i>Note:</i></b>
            </p>
            <p> Program di atas akan lambat saat memuat, tetapi akan berjalan dengan cepat setelahnya. </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 25,
            'isi' => '<p> Untuk latihan, coba kamu train data dengan program di bawah ini untuk melakukan training data ke arah mana jari Kamu menunjuk!
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=follow%20finger" target=”_blank”>
                    <img src="/assets/img/blocks/blok6.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>
            <p> Ada banyak cara untuk meningkatkan program ini. Salah satunya dalah program selanjutnya di bawah ini! </p>
            <p> Tambahkan label ketiga atau keempat dan gunakan label itu untuk mengontrol turtle. </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=follow%20lean" target=”_blank”>
                    <img src="/assets/img/blocks/blok5.png" alt="ecraft2learn" width="80%" class="img-fluid rounded">
                </a>
            </center><br>

            <p> Dengan program tersebut, kamu dapat bereksperimen dengan beberapa blok, yaitu: </p>

            <p>
                Blok <img src="/assets/img/blocks/blok-2.png" alt="ecraft2learn" width="30%">
                untuk mengirimkan semua sprite kamu ke tab training
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-3.png" alt="ecraft2learn" width="30%">
                untuk train gambar-gambar kamu
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-4.png" alt="ecraft2learn" width="30%">
                untuk mendapatkan nilai confidences dari sprite 
            </p><br>

            <hr>
            
            <p class="text-orange">
                <b><i>Note:</i></b>
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-3.png" alt="ecraft2learn" width="30%">
                adalah versi sederhana dari blok <img src="/assets/img/blocks/blok-1.png" alt="ecraft2learn" width="30%">
                untuk menghindari penggunaan kamera saat training data.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 26,
            'isi' => '<p>
            Kamu tahu tidak? Komputer itu dapat dilatih untuk membedakan suara yang berbeda termasuk juga ucapan loh! Bagaimana caranya?
            </p>
            <p>
                Nah, di sini Kamu dapat membuat program yang merespons suara apa pun. Kamu juga dapat melatihnya untuk mengenali beberapa kata atau frasa berbeda yang berfungsi secara lokal di komputer Kamu tanpa mengirim audio apa pun ke server cloud.
            </p>
            <p> Ayo coba program di bawah ini! </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=train%20audio" target=”_blank”>
                    <img src="/assets/img/blocks/blok7.png" alt="ecraft2learn" width="70%" class="img-fluid rounded">
                </a>
            </center><br>
            <p>
                Blok <img src="/assets/img/blocks/blok-5.png" alt="ecraft2learn" width="30%">
                memiliki opsi untuk menggunakan Pre-trained model dari 20 kata pada perangkat Kamu!
            </p>
            <p>
            Ia mampu mengenali nol, satu, dua, tiga, empat, lima, enam, tujuh, delapan, sembilan, naik, bawah, kiri, kanan, pergi, berhenti, ya, dan tidak.
            </p>
            <p> Hal itu bergantung pada speech command recognizer yang dibuat oleh Google. </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 27,
            'isi' => '<p">
                Contoh di sini menggunakan training audio untuk memberi tahu sprite agar bisa bergerak "forward", "right", atau "stop".
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=train%20and%20speak%20commands" target=”_blank”>
                    <img src="/assets/img/blocks/blok8.png" alt="ecraft2learn" width="70%" class="img-fluid rounded">
                </a>
            </center><br>

            <hr>
            
            <p class="text-orange">
                <b><i>Note:</i></b>
            </p>
            <p>
                Kamu dapat membuat suara atau berbicara dalam bahasa lain dan program akan bekerja dengan baik.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 28,
            'isi' => '<p>
            Apakah Kamu tahu apa itu Google Teachable Machine?
            </p>
            <center><p><i>Klik gambar di bawah ini untuk melihatnya!</i></p></center>
            <center> 
                <a href="https://teachablemachine.withgoogle.com/" target=”_blank”>
                    <img src="/assets/img/aset/aset6.png" alt="teachablemachine" width="70%" class="img-fluid rounded">
                </a>
            </center><br><br>
            
            <p>
                Google mengembangkan Teachable Machine untuk mengenalkan proses training untuk kategori foto, suara, dan pose. Setelah melakukan training kamu bisa export model tersebut ke server mereka atau download filenya untuk disimpan di web server kamu.
            </p>
            <p>
                Di bawah ini kamu bisa mecoba blok menggunakan model dari Teachable Machine! Kamu bisa menghentikan audio dengan menggunakan Blok <img src="assets/img/blocks/blok-6.png" alt="ecraft2learn" width="45%">
            </p><br>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=teachable%20machine%20exercise#teachable-machine&editMode" target=”_blank”>
                    <img src="/assets/img/blocks/blok9.png" alt="ecraft2learn" width="70%" class="img-fluid rounded">
                </a>
            </center><br>

            <hr>
            
            <p class="text-orange">
                <b><i>Note:</i></b>
            </p>
            <p>
                Blok <img src="/assets/img/blocks/blok-8.png" alt="ecraft2learn" width="35%">
                menunjukkan probabilitas bahwa kostum itu ada di setiap kategori yang dilatihnya.
            </p>
            <p>
                Sedangkan berbeda dengan blok <img src="/assets/img/blocks/blok-7.png" alt="ecraft2learn" width="60%">
                yang menjalankan input setiap kali sebuah kata dikenali.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 29,
            'isi' => '<div class="col-lg-5">
            <center>
                <img src="/assets/img/aset/aset7.png" alt="ecraft2learn" width="20%" class="img-fluid rounded">
            </center>
            </div>
            <div class="col-lg-6">
            <br>
                <p>
                    Kamu tahu tidak?
                    Google melatih model deep learning pada lebih dari 64.000 gambar orang loh!
                </p>
                <p>
                    Apa itu Deep learning? Deep learning adalah bagian dari kecerdasan buatan dan machine learning, yang merupakan pengembangan dari neural network multiple layer untuk memberikan ketepatan tugas seperti deteksi objek, pengenalan suara, terjemahan bahasa dan lain – lain.
                </p>
                <p>Keren kan?</p>
                <p>Gimana sih caranya?</p>
            </div>

            <br>
            <p>
            Pertama, model yang di-train terlebih dahulu mengidentifikasi lokasi bagian tubuh dalam gambar baru. Lalu kemudian posisi dari bagian-bagian tersebut diperhalus dengan mempertimbangkan poin-poin penting yang berdekatan (misalnya: siku kiri hanya terhubung dengan pergelangan tangan kiri dan bahu kiri).
            </p>
            <p>
            Jika gambar lebih dari satu orang, model perlu memisahkan poin-poin kunci untuk orang yang berbeda.
                Algoritma dimulai dengan titik kunci yang paling dipercaya daripada titik awal yang disukai seperti hidung. Kemudian mempertimbangkan lokasi bagian tubuh yang terhubung ke titik kunci, kemudian yang terhubung ke bagian tersebut, dan seterusnya. Selain itu, jika segmentasi juga diperlukan, setiap piksel diberi kode untuk setiap bagian tubuh yang dimilikinya.
            </p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 30,
            'isi' => '<center>
            <img src="/assets/img/google.png" alt="google creative" width="35%" class="img-fluid rounded">
            </center><br>
            <p>
            Google Creative Lab merilis perangkat lunak berbasis browser yang disebut Posenet untuk estimasi pose manusia secara real-time. Perangkat lunak ini dapat menentukan lokasi 17 bagian wajah dan tubuh yang berbeda: hidung, mata, telinga, bahu, siku, pergelangan tangan, pinggul, lutut, dan pergelangan kaki.
            </p>
            <center> 
                <img src="https://1.bp.blogspot.com/-yRn-UAqO8Mc/XcCkQ6nKOrI/AAAAAAAAAww/H4FvoPHdg-oQJJ_-03qK5lsXXGEFRJoWwCLcBGAsYHQ/s320/p1.gif" alt="ecraft2learn" width="25%" class="img-fluid rounded">
            </center><br>
            <p>
            Posenet dibuat menggunakan deep machine learning dan memanfaatkan Tensorflow.js. <br>
            <b>Apa itu Tensorflow?</b> Tensorflow adalah sebuah framework machine learning yang dapat membantumu membuat neural network (jaringan artifisial yang mirip otak manusia) dalam skala besar. 
            </p><br>

            <p>
            Nah sedangkan dalam Posenet ini, yang sangat mengesankan adalah ia bekerja di browser tanpa perangkat lunak atau perangkat keras khusus (selain webcam).
            </p><br>


            <p>
                Blok <img src="/assets/img/blocks/blok-28.png" alt="ecraft2learn" width="12%">
                menginput daftar pose untuk setiap orang di depan kamera. Sistem 
                dapat dikonfigurasi pada tab "pose" untuk mengoptimalkan adegan jika lebih dari satu orang. Trade-off antara kecepatan dan akurasi juga dapat dilakukan.
            </p><br>


            <p>
                Di bawah ini, Kambu bisa bereksperimen dengan program yang bisa mendeteksi lokasi dari 17 atau 33 bagian tubuh yang berbeda. <b>Yuk coba!</b>
            </p>

            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=pose" target=”_blank”>
                    <img src="/assets/img/blocks/blok33.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>

            <p>
                Blok <img src="/assets/img/blocks/blok-29.png" alt="ecraft2learn" width="20%">
                adalah untuk menunjukkan daftar dari pose itu sendiri. Setiap pose adalah daftar daftar kunci dan nilai.<br> 
                Terdapat beberapa versi pada program di atas, di mana versi PoseNet berfungsi untuk banyak orang, sedangkan dua lainnya paling cocok untuk satu pose saja.
            </p><br>

            <p>
                Sedangkan di bawah ini, Kamu bisa mencoba program untuk mendeteksi lokasi dari 21 bagian tangan yang berbeda! 
                <br>Mengapa bisa? well, Google telah mengembangkan model yang menunjukkan 21 lokasi pada bagian tangan juga loh! Yuk coba!
            </p>

            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=hand%20pose" target=”_blank”>
                    <img src="/assets/img/blocks/blok34.png" alt="ecraft2learn" width="45%" class="img-fluid rounded">
                </a>
            </center><br><p>
                Blok <img src="/assets/img/blocks/blok-30.png" alt="ecraft2learn" width="25%">
                digunakan untuk menunjukkan lokasi dan skor kepercayaan dari bagian-bagian tersebut.
            </p><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 31,
            'isi' => '<center> 
            <img src="/assets/img/aset/aset8.png" alt="ecraft2learn" width="25%" class="img-fluid rounded">
            </center><br>
            <p>Bagaimana permainan Simon Says ini bekerja?</p>
            <p>
            Jadi, ia memilih apakah akan mengawali pernyataannya dengan "Simon Says" dan memilih dua bagian tubuh untuk disatukan oleh pemain. Deteksi pose digunakan untuk melihat apakah Kamu membuat pose yang sesuai dengan apa yang dikatakan.
            </p>
            <p>
            Untuk memperjelasnya, ayo Kamu coba program di bawah ini!
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=simon%20says#teachable-machine" target=”_blank”>
                    <img src="/assets/img/aset/aset9.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>
            <p>
            Permainan ini bisa kamu tingkatkan lagi dengan banyak cara loh! 
            <b>Be Creative!</b>
            </p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 32,
            'isi' => '<p>
            Dengan Machine Learning, Kamu bisa membuat permainan gunting kertas batu loh!
            <br>Cara mainnya adalah dengan meletakkan tangan Kamu ke salah satu dari tiga konfigurasi.
            <br>Ayo Main!
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=rock%20paper%20scissors&noRun" target=”_blank”>
                    <img src="/assets/img/aset/aset10.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>

            <p>
                Permainan ini menggunakan blok <img src="/assets/img/blocks/blok-9.png" alt="ecraft2learn" width="30%">
                sebanyak 4 kali (kertas, gunting, batu, dan “other”).
            </p>

            <p>
                Setelah training selesai, permainan dimulai dan program memilih gerakan acak dan membandingkannya dengan gerakan Kamu di depan kamera.
            </p>

            <p>
                Jangan lupa! Permainan ini dapat ditingkatkan lagi dengan banyak cara loh! 
                <b>Be Creative!</b>
            </p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 33,
            'isi' => '<p>
            Pada bagian ini, program menggunakan BodyPix. 
            <br>Apakan Kamu tahu apa itu Bodypix?
            </p>
            <p>
                BodyPix adalah model segmentasi deep learning yang mengklasifikasikan setiap piksel dalam foto manusia. Contohnya, apakah bagian tertentu termasuk bagian dari tubuh? Jika ya, bagian apakah itu? Lalu program akan mengetahui bagian tersebut adalah tangan, lengan, kaki, atau yang lainnya.
            </p>
            <p>
                Sekarang, coba perhatikan gambar berikut:
            </p>
            <center> 
                <img src="/assets/img/aset/aset11.png" alt="ecraft2learn" width="40%" class="img-fluid rounded">
            </center><br>
            <p>
            Gambar di atas adalah contoh dimana BodyPix memberikan warna berbeda pada masing-masing bagian tubuh.

            <br>Terdapat dua blok segmentasi, yaitu:

            </p><br>
            
            <p>
                <center><img src="/assets/img/blocks/blok-10.png" alt="ecraft2learn" width="35%"></center>
                Blok di atas paling cocok untuk menganalisis gambar satu orang, dan
            </p>
            <p>
                <center><img src="/assets/img/blocks/blok-11.png" alt="ecraft2learn" width="35%"></center>
                Blok di atas paling cocok untuk menganalisis gambar banyak orang
            </p>
            <p>
                Kedua blok tersebut dapat digunakan dengan gambar dari sejumlah orang tetapi masing-masing lebih cepat dan lebih informatif bila digunakan sesuai indikasinya.
            </p>

            <center>
                <button type="button" data-toggle="collapse" data-target="#detailMateri15C4" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-lg">Lihat Argumen Disini!</button>
            </center>

            <div class="collapse" id="detailMateri15C4">
                <br>
                <div class="card card-body">
                    <p>
                        • Buat Kostum Segmentasi (Create Segmentation Costume) jika benar, menunjukkan kostum baru, di mana setiap piksel adalah salah satu dari 24 warna 
                    </p>
                    <p>
                        • Pemetaan Warna (Color Mappings)disediakan daftar dari 24 warna mana yang digunakan untuk setiap bagian tubuh. Setiap warna adalah daftar empat angka antara 0 dan 255 yang menentukan jumlah warna merah, hijau, biru, dan buram. 
                    </p>
                    <p>
                        • Buat Kode Piksel (Create Pixel Codes) jika benar, menunjukkan daftar angka dari 0 hingga 23 yang sesuai dengan bagian tubuh berbeda untuk setiap piksel dalam gambar. 
                    </p>
                    <p>
                        • Buat Pose (Create Poses) jika benar, menunjukkan pose tubuh. 
                    </p>
                    <p>
                        • Buat Bitmask Orang (Create Person Bitmasks) jika benar dan menggunakan blok multi-person segmentations and poses of costume... kemudian daftar nol dan satu dilaporkan. Satu menunjukkan bahwa piksel adalah bagian dari seseorang dan nol sebaliknya. 
                    </p>
                    <p>
                        • Config jika yang tersedia adalah daftar kunci dan nilai bergantian seperti yang dijelaskan di bawah ini! 
                    </p>
                    <center>
                    <a href="https://github.com/tensorflow/tfjs-models/tree/master/body-pix#user-content-params-in-segmentpersonparts">
                        <button type="button" class="btn btn-primary btn-md">Segmentasi <b>Satu</b> Orang</button>
                    </a>
                    <a href="https://github.com/tensorflow/tfjs-models/tree/master/body-pix#user-content-params-in-segmentmultipersonparts">
                        <button type="button" class="btn btn-primary btn-md">Segmentasi <b>Banyak</b> Orang</button>
                    </a>
                    </center>
                    
                </div>
            </div>

            <br>
            <p>
                Ayo jelajahi contoh di bawah ini! Lihat apakah model segmentasi satu orang dapat menemukan bagian tubuh dengan benar!
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=segmentation%20single&editMode" target=”_blank”>
                    <img src="/assets/img/blocks/blok12.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>

            <p>
                Dan untuk lihat apakah model segmentasi banyak orang dapat menemukan bagian tubuh dengan benar, jelajahi contoh di bawah ini!
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=segmentation%20multi&editMode" target=”_blank”>
                    <img src="/assets/img/blocks/blok13.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>

            <p>
            Lalu sekarang, ayo lihat contoh sebuah proyek dengan menggunakan segmentasi!
            </p>
            <center> 
            <h4 class="text-orange">The Balloon Game</h4>
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=balloon%20game" target=”_blank”>
                    <img src="/assets/img/aset/aset12.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>
            <p>
            Balon perlahan jatuh dan poin akan diberikan ketika balon diletuskan oleh tangan atau kaki. Namun, balon yang meletus di kepala akan kehilangan poin.
            </p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 34,
            'isi' => '<p>
                    Pada bagian ini, program menggunakan COCO-SSD.
                    <br>Apa itu COCO-SSD?
                    </p>
                    <p>
                    COCO-SSD adalah model deep learning untuk mendeteksi objek. Hal ini dapat mendeteksi hingga 100 objek dari 80 jenis yang berbeda. COCO-SSD memberi label pada objek-objek tersebut dan menyediakan "kotak pembatas" atau “bounding box” untuk setiap objek yang terdeteksi. Kotak pembatas adalah persegi panjang terkecil yang mengelilingi objek.
                    </p>
                    <center> 
                        <img src="/assets/img/aset/aset13.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                    </center><br>
                    <p>
                        COCO-SSD dilatih menggunakan dataset COCO yang memiliki label dan lokasi 1,5 juta objek di lebih dari 200.000 gambar. SSD disini adalah singkatan dari Single Shot MultiBox Detection. 
                        Kenapa begitu? Well, karena COCO-SSD adalah model tunggal yang telah dilatih untuk mendeteksi beberapa kotak pembatas dari beberapa objek dalam sebuah gambar.
                    </p>
                    

                    <p>
                        Blok <img src="/assets/img/blocks/blok-12.png" alt="ecraft2learn" width="25%">
                        dapat melaporkan daftar deskripsi setiap objek yang terdeteksi. 
                        <br>Ayo bereksperimen dengan blok di atas melalui contoh berikut:
                    </p>

                    <center> 
                        <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=detect%20objects%20exercise&editMode" target=”_blank”>
                            <img src="/assets/img/aset/aset14.png" alt="ecraft2learn" width="40%" class="img-fluid rounded">
                        </a>
                    </center><br>
                    
                    <center>
                        <button type="button" data-toggle="collapse" data-target="#detailMateri15C4" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-lg">Baca Lebih Lanjut!</button>
                    </center>
                    
                    <div class="collapse" id="detailMateri15C4">
                        <br>
                        <div class="card card-body">
                            <center>
                            <img src="/assets/img/blocks/blok14.png" alt="ecraft2learn" width="60%" class="img-fluid rounded">
                            
                            <p>
                                • <i>Contoh opsi untuk objek di blok kostum</i>
                            </p>    
                            </center><br>
                            <p>
                                • <b>Load Smaller, Faster, But Less Accurate Model</b>  jika benar (true) memuat model yang berukuran sekitar sepertiga ukuran model default. Ini lebih cepat tetapi kurang akurat. 
                            </p>
                            <p>
                                • <b>Maximum Number of Objects</b>  jika diberikan mengesampingkan nilai default 20. Sedangkan 100 adalah jumlah objek terbesar yang dapat dideteksi model. 
                            </p>
                            <p>
                                • <b>Minimum Confidence Score</b> jika mengesampingkan nilai default 0,5. Blok objects in costume hanya akan melaporkan objek dengan skor confidence setidaknya nilai ini. 
                            </p>
                            
                        </div>
                    </div>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 35,
            'isi' => '<p>
            Baru-baru ini para peneliti telah menemukan cara untuk menggunakan dua program machine learning untuk mengambil gambar dan mengubahnya menjadi seperti lukisan terkenal. Hal itu biasa disebut dengan style transfer atau transfer gaya. 
            </p><br>

            <p>
                Dengan blok <img src="/assets/img/blocks/blok-13.png" alt="ecraft2learn" width="30%">
                , Kamu bisa mengambil kostum sprite (bisa berupa gambar apa saja) pada Snap! dan nama gaya, lalu menghasilkan kostum baru dalam gaya tersebut.
            </p>

            <p>
                Ayo coba program di bawah ini!
                <br> Klik bloknya untuk mengambil foto dan buat ulang dengan <a href="#styles">gaya yang Kamu pilih!</a>
            </p>

            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=style%20transfer%20exercise&editMode" target=”_blank”>
                    <img src="/assets/img/blocks/blok15.png" alt="ecraft2learn" width="70%" class="img-fluid rounded">
                </a>
            </center><br><br>

            <p>
                Klik di bawah ini untuk mencoba "ghost effect" dari Snap! 
            </p>
            <center> 
                <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=style%20transfer" target=”_blank”>
                    <img src="/assets/img/aset/aset15.png" alt="ecraft2learn" width="50%" class="img-fluid rounded">
                </a>
            </center><br>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 36,
            'isi' => '<p>
            Pekerjaan yang dilakukan oleh mahasiswa di New York University Tisch School of the Arts yang menciptakan versi model style transfer berbasis web dengan 
            blok <img src="/assets/img/blocks/blok-13.png" alt="ecraft2learn" width="30%">
            </p>
            <p>Lalu oleh seorang siswa SMA bernama Luie diadaptasi agar berfungsi pada Snap!.<br>Keren bukan?</p>
            <p>
            Tujuannya adalah untuk menghasilkan gambar baru yang cocok dengan fitur gaya dari gambar menggunakan model deep learning. Model machine learning telah dilatih untuk melakukan hal itu dengan cepat.
            </p><br>

            <p>
                Ayo nonton video tentang Style Transfer di bawah ini agar tahu bagaimana Style Transfer dapat bekerja!
            </p>
            <center> 
            <iframe width="560" height="315" src="https://www.youtube.com/embed/WHmp26bh0tI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 38,
            'isi' => '<p style="font-size: 18px">
            Pada bagian ini kita akan melakukan eksplorasi pada model <i>Machine Learning</i> Kertas Gunting Batu. Proses pembuatan model ini akan dilakukan di website Google Teachable Machine dan akan dibantu oleh chatbot. Silahkan kalian klik chatbot yang ada dibawah kanan kemudian ketik "eksplorasi".
            </p>
',
            'xp' => 10
        ]);

        Material::create([ //blm
            'content_id' => 39,
            'isi' => '<p>
            Pekerjaan yang dilakukan oleh mahasiswa di New York University Tisch School of the Arts yang menciptakan versi model style transfer berbasis web dengan 
            blok <img src="/assets/img/blocks/blok-13.png" alt="ecraft2learn" width="30%">
            </p>
            <p>
                Lalu oleh seorang siswa SMA bernama Luie diadaptasi agar berfungsi pada Snap!.
                <br> Keren bukan?
            </p>
            <p>
            Tujuannya adalah untuk menghasilkan gambar baru yang cocok dengan fitur gaya dari gambar menggunakan model deep learning. Model machine learning telah dilatih untuk melakukan hal itu dengan cepat.
            </p><br>

            <p>
                Ayo nonton video tentang Style Transfer di bawah ini agar tahu bagaimana Style Transfer dapat bekerja!
            </p>
            <center> 
            <iframe width="560" height="315" src="https://www.youtube.com/embed/WHmp26bh0tI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </center>',
            'xp' => 10
        ]);

        // END OF MATERIAL CHAPTER 4 //

        /*
        Material::create([
            'content_id' => 19,
            'isi' => '<p>Apakah kalian pernah menggunakan fitur pencarian pada google menggunakan suara kalian? </p>
            <br><img class="object-contain w-full mx-auto" src="/res/img/course/sr-1.png" alt=""><br>
            <p>Jika kalian pernah menggunakannya, itu adalah gambaran produk AI yang menggunakan speech recognition di dalamnya!</p>
            <br><p>Sebenarnya jauh lebih mudah untuk komputer memulai dengan teks dan berakhir dengan ucapan (speech synthesis) daripada memulai dengan ucapan dan berakhir dengan teks yang sesuai. Biasanya, lebih mudah membuat komputer menghasilkan sesuatu daripada mengenalinya.</p>
            <br><img class="object-contain w-full mx-auto" src="/res/img/course/sr-2.png" alt="">
            <p class="text-center text-sm my-2">Sumber: https://seranking.com/blog/voice-search-seo/</p>
            <br><p>Speech recognition merupakan salah satu hasil dari teknologi AI untuk mengenali suara seperti ucapan. Ucapan yang kita ucapkan dan suara lainnya akan menciptakan getaran di udara yang menyebabkan getaran di mikrofon komputer, getaran tersebut akan diubah menjadi angka. Speech recognition dimulai dengan angka-angka ini dan upaya dalam menentukan apa yang dikatakan. Proses ini tidak selamanya berjalan sesuai keinginan kita karena adanya faktor lain seperti faktor suara sekitar yang akan menyebabkan kesalahan pada speech recognition.</p>',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 20,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 21,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 22,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 24,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 25,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 26,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 27,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 28,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 29,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 31,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 32,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 33,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 34,
            'isi' => '',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 35,
            'isi' => '',
            'xp' => 10
        ]);
*/
        Material::create([
            'content_id' => 41,
            'isi' => '<p>Perlu kita ketahui, lebih mudah bagi komputer untuk memulai pekerjaan dengan teks dan menghasilkan ucapan daripada memulai dengan ucapan dan menghasilkan teks yang sesuai. Karena biasanya, bagi komputer lebih mudah untuk menghasilkan sesuatu (contohnya: menghasilkan/menampilkan teks, gambar dan lainnya) daripada mengenali atau memindai sesuatu.</p>
            <img class="img-materials" src="https://imageio.forbes.com/specials-images/imageserve/61c4dab3dcce70ad2cdf606a/voice-recognition-with-smart-phone/960x0.jpg?format=jpg&width=960" alt="Image Recognition" width="300" >
    <p>Ucapan maupun suara lainnya dapat menyebabkan getaran di udara yang menyebabkan getaran di mikrofon komputer. Kemudian getaran ini diubah menjadi angka. Inilah yang kita sebut dengan pengenalan ucapan/suara atau <b><i>Speech Recognition.</i></b> <i>Speech Recognition</i> akan mendeteksi suara dari ucapan dan menerjemahkannya dengan angka-angka kemudian mencoba menentukan apa yang dikatakan. Namun perlu kita ketahui proses ini tidak sempurna dan tentunya kesalahan dapat terjadi.
</p>
    <br>
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 42,
            'isi' => '
                <p>Ayo kita mencoba! Klik pada blok berikut, ucapkan sesuatu, lalu klik pada variabel <i>"last thing heard"</i>.Jika semuanya berjalan dengan baik, kalian akan melihat apa yang baru saja diucapkan.</p>
   <figure class = "snap-iframe"
        id = "simple listen block"
        container_style = "width: 725px; height: 300px" >
</figure>
Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=simple%20listen%20block&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>Cobalah mengucapkan sesuatu, lihat hasilnya, klik blok tersebut lagi, ucapkan hal lain, dan lihat lagi. Jika kalian ingin mencoba bahasa lain, gunakan perintah <i> "set default language".</i> Jika memungkinkan, sistem akan menggunakan bahasa yang diberikan jika tidak ada bahasa atau suara eksplisit yang diberikan untuk perintah mendengarkan yang lebih canggih. Ada banyak cara untuk menentukan bahasa:</p>
    <ol type="1">
        <li> 1. Gunakan nama bahasa dalam bahasa Inggris</li>
        <li> 2. Gunakan nama bahasa dalam bahasa tersebut</li>
        <li> 3. Berikan kode bahasa diikuti dengan kode dialek.</li>
    </ol>
    <br>
            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 43,
            'isi' => '
                <p>Program berikut menggunakan blok <i class="highlight-word">"listen then ..."</i> untuk mengontrol <i>sprite</i>. Kalian dapat memerintahkannya untuk maju atau berbelok ke kanan. Kemudian program akan menanyakan seberapa banyak dan melaksanakan perintah tersebut. Katakan <i> "goodbye" </i> untuk keluar dari program. Terkadang kita perlu mengulangi perkataannya. Terkadang program dapat melakukan kesalahan dalam mendengar ucapan</p>

    <br>
   <figure class = "snap-iframe"
        id = "story generator"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" >
        
</figure>
         <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=command" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p class="box-highlight">Latihan: Coba tambahkan perintah <i> "turn left" </i> ke dalam program. Nah kamu juga dapat menambahkan perintah lainnya ya! Petunjuk: bagaimana jika kita menambahkan perintah mengubah ukuran, tampilan, warna, atau lainnya? Bagaimana dengan melakukan animasi sebagai respons terhadap perintah suara?</p>

            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 44,
            'isi' => '
             <p> Jika kalian mengklik <img src="/materials/panah.png" class="img-materials" alt="">kalian akan melihat blok-blok di balik program. Jika Kalian kemudian mengklik kanan pada <i class="highlight-word">"speak turtle commands"</i> dan memilih "edit", Kalian akan melihat program berikut.</p> 
    <img src="/materials/spoken-block.png" alt="" style="width: 40%;" class="img-materials">
    <p> Variabel "spoken" berisi apa yang baru saja dikenali. Perintah <i> if-then-else </i> bersarang pertama-tama akan menguji ucapan untuk keluar dari program, kemudian untuk gerakan maju, dan kemudian perintah berbelok. Jika tidak ada yang cocok, maka respons "tidak dimengerti" dibuat. Baik perintah berbelok maupun bergerak menyebabkan program menanyakan jumlah untuk berbelok atau bergerak. Ketika sebuah angka diucapkan, kura-kura kemudian berbelok atau bergerak menyesuaikan.</p>


    <br>

            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 45,
            'isi' => '
             <p>Program penghasil kalimat berikut dimulai dengan sebuah <i class="highlight-word"> "template" </i> kalimat acak. Program menganggap setiap kata yang diawali dengan "?" sebagai variabel yang digantikan dengan bertanya kepada pengguna untuk sesuatu. Contohnya:</p>
    <p class="box-highlight"><i>The silly ?PLURAL-NOUN like ?ADJECTIVE bananas.</i></p>    
    <p>Dari kalimat diatas, program meminta pengguna untuk mengucapkan <i class="highlight-word"> plural-noun </i> atau kata plural jamak dan kemudian meminta <i>adjective </i> atau kata sifat. Misalkan pengguna menjawab <i> "potatoes" </i> dan <i> "gigantic" </i>, maka program akan mengatakan</p>
    <p class="box-highlight"><i>The silly potatoes like gigantic bananas.</i></p>

   <figure class = "snap-iframe"
        id = "part of speech broadcast"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=part%20of%20speech%20broadcast" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    
   
    
   
    <img src="/materials/example-block.png" alt="" style="width: 50%;" class="img-materials">
    <p>Bagian program ini melalui kalimat kata per kata, berhenti ketika sebuah kata atau frasa dimulai dengan "?". Program berhenti setelah meminta penggantian dan kemudian memanggil perintah <i>"Broadcast speech recognition results ...".</i> Kode berikutnya merespons ketika sesuatu telah didengar dan diinterpretasikan:</p>
    <img src="/materials/example-block2.png" alt="" style="width: 50%;" class="img-materials">
    <p>Program tersebut mengulang apa yang didengar dan menggantikannya ke dalam daftar kata dengan menggantikan kata yang dimulai dengan "?". Contoh ini menggambarkan bagaimana menggunakan sintesis ucapan dan pengenalan untuk membuat aplikasi yang sepenuhnya verbal. Ini juga merupakan contoh program yang melintasi batas disiplin ilmu. Untuk menghasilkan kalimat yang gramatikal benar (meskipun seringkali nonsens atau lucu), diperlukan konsep-konsep tata bahasa seperti kata benda, frasa kata benda, kata kerja, kata sifat, dan kata keterangan. Masalah tentang kesepakatan jumlah dan waktu muncul secara alami. Menurut kalian bisakah program seperti ini bekerja tanpa konsep-konsep tata bahasa seperti kata benda, kata kerja, kata sifat, dll?</p>
    <p>Sebuah program tanpa konsep tata bahasa seperti kata benda, kata kerja, atau kata sifat mungkin dapat beroperasi dalam konteks tertentu, terutama jika tujuannya adalah untuk menghasilkan hasil verbal yang tidak bergantung pada struktur gramatikal tradisional. Namun, untuk berinteraksi dengan bahasa manusia secara efektif dan menghasilkan kalimat yang dapat dimengerti dan bermakna secara umum, konsep-konsep tata bahasa sangat penting.
        Dalam kasus seperti program contoh yang Anda tunjukkan, meskipun hasilnya mungkin terkadang tidak gramatikal secara tradisional, penggunaan kata-kata seperti <i> "plural noun" </i> atau <i> "adjective" </i> membantu dalam memberikan kerangka kerja yang diperlukan untuk mengatur informasi yang diterima dan dihasilkan secara verbal. Konsep-konsep ini membantu dalam membangun kalimat yang lebih terstruktur dan dapat dipahami, meskipun hasil akhirnya mungkin lebih bersifat kreatif atau eksperimental.</p>
    
    <br>
    <!-- subjudul -->
    
            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 46,
            'isi' => '

            <p>Program berikut dapat memperluas kalimat yang lebih rumit dengan menambahkan fitur baru. Yang biasanya kita hanya menghasilkan kalimat pendek dan sederhana, disini kita belajar untuk menghasilkan kalimat yang lebih rumit dengan cerita pendek. Jika program menemukan kata yang dimulai dengan "=", itu akan menggantikannya dengan respons terakhir untuk permintaan contoh kata/frasa tersebut.</p>    

   <figure class = "snap-iframe"
        id = "story generator"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=story%20generator" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     
    <p>Contoh, di bawah ini terdapat cerita pendek yang memakai <i> template </i> kalimat acak</p> <p class="box-highlight"><i>This is a story about ?GIRLS-NAME. =GIRLS-NAME is ?ADJECTIVE and very ?ADJECTIVE. She travelled to ?PLACE-NAME. There she met ?BOYS-NAME who was a ?OCCUPATION in =PLACE-NAME. =GIRLS-NAME and =BOYS-NAME lived ?ADVERB ever after.</i></p>
    <p>Apabila kita merespon dengan <span class="highlight-word" > "Juliet", "warm", "beautiful", "Verona", "Romeo", "amateur poet", dan "barely"</span > maka ceritanya akan menjadi seperti dibawah ini</p> <p class="box-highlight"><i>This is a story about Juliet. Juliet is warm and very beautiful. She travelled to Verona. There she met Romeo who was a amateur poet in Verona. Juliet and Romeo lived barely ever after. </i></p>  
    <img class="img-materials" src="https://miro.medium.com/v2/resize:fit:1280/0*oreyBvL73mL_4O00.jpg" alt="Image Recognition" width="300" > 
    <br>
              
            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 47,
            'isi' => '

         <p>Demo berikut ini mirip dengan <i class="highlight-word"> Google Assistant </i>. Demo ini meminta pengguna untuk mengatakan sesuatu dan kemudian mengirimkan kata-kata tersebut ke Wikipedia. Biasanya, ada banyak hasil yang cocok sehingga program memilih salah satunya secara acak dan mengucapkannya. </p>
     <img class="img-materials" src="https://i0.wp.com/diengcyber.com/wp-content/uploads/2022/06/GAMBAR-3-4.jpg?fit=1280%2C720&ssl=1" alt="Image Recognition" width="300" >
 
    <figure class = "snap-iframe"
        id = "Wikipedia answers"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" 
       >
</figure>
    <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=Wikipedia%20answers" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     
     <img src="assets/wikipediablock.png" alt="" style="width: 40%;">
    <br>

    

            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 48,
            'isi' => '
    <p>Berikut ini adalah demo antarmuka ucapan yang sangat sederhana ke <span class="highlight-word"> layanan cuaca </span>. Program ini meminta nama kota dan mengucapkan suhu saat ini serta perkiraan cuaca. Program cuaca dapat ditingkatkan dengan berbagai cara. Misalnya, program dapat menanyakan informasi cuaca apa yang diinginkan pengguna.</p>

    <img class="img-materials" src="https://play-lh.googleusercontent.com/GdXjVGXQ90eVNpb1VoXWGT3pff2M9oe3yDdYGIsde7W9h3s2S6FDLfo1uO-gljBZ1QXO" alt="Image Recognition" width="300" >
    
    <figure class = "snap-iframe"
        id = "weather"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" 
       >
</figure>
     <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=weather" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    
    <br><br>
            ',
            'xp' => 10
        ]);
        
        Material::create([
            'content_id' => 49,
            'isi' => '
     <p><i class="highlight-word">Speech Recognition</i> dapat digunakan untuk mentranskrip ucapan yang diucapkan. Mereka yang tidak dapat mengetik atau menulis dapat menggunakannya untuk berkomunikasi secara tekstual dan menghasilkan catatan serta laporan. Ada banyak konteks khusus di mana teknologi ini sangat berguna. Misalnya, dokter dapat menghasilkan transkrip percakapan dengan pasien mereka, yang dapat meningkatkan catatan medis pasien. Transkripsi otomatis memungkinkan pencarian teks dalam video dan pembuatan caption untuk video. Dipadukan dengan terjemahan, <i>Speech Recognition</i> dapat memberikan input ke layanan terjemahan dan hasilnya dapat diubah menjadi ucapan dalam bahasa lain.</p><p>Penggunaan lain dari <i>Speech Recognition</i> adalah sebagai antarmuka ke komputer atau artefak digital. Aplikasi atau robot dapat dibuat untuk menerima perintah verbal. Ini sangat memberdayakan bagi orang-orang dengan disabilitas yang tidak dapat melakukan tugas-tugas tersebut sendiri. Asisten seperti <span class="highlight-word">Siri</span> dapat memberikan respons yang berguna terhadap pertanyaan yang diucapkan. Input dan output verbal dapat menjadi cara teraman untuk berkomunikasi dalam beberapa situasi seperti saat mengemudi atau memandu pesawat.</p>   
     <img class="img-materials" src="https://www.apple.com/v/siri/h/images/meta/siri__fsb5b98qe526_og.png?202406092055" alt="Image Recognition" width="300" >     
    <br>
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 50,
            'isi' => '
    <p>Seperti banyak teknologi lainnya, <span class="highlight-word"><i>Speech Recognition</i> tentunya dapat disalahgunakan</span>. Bisa saja digunakan untuk memata-matai populasi secara luas. Contoh lainnya adalah layanan yang membutuhkan interaksi verbal antar manusia nantinya bisa saja digantikan dengan Speech Recognition, padahal tidak memiliki empati ataupun perasaan layaknya interaksi antar manusia Penggunaan robot pendamping untuk memberikan dukungan sosial saat ini menjadi kontroversial karena robot tersebut mungkin kurang pemahaman dan empati. Teknologi ucapan telah menjadi bagian dari mainan interaktif dan beberapa berpendapat bahwa anak-anak menjadi terlalu terikat secara emosional pada mereka.</p>
<img class="img-materials" src="https://static.scientificamerican.com/sciam/cache/file/DAE77085-C74B-4726-8AF075DAAE343F90_source.jpg" alt="Image Recognition" width="300" >     

    <p class="box-highlight">Apakah menurut kalian manfaatnya lebih besar daripada bahayanya? Apakah ada cara untuk menghindari bahaya tersebut?</p>
    <br>
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 51,
            'isi' => '
     <p>Dimulai dengan <span class="highlight-word">mikrofon yang mengubah getaran di udara (yaitu, suara) menjadi angka (menggunakan sesuatu yang disebut konverter analog-ke-digital) </span>. Suara yang didigitalkan dipecah menjadi segmen pendek (seperseratus atau seperseribu detik panjangnya) dan dimasukkan ke dalam mesin pengenalan. Saat ini, yang terbaik mengandalkan jaringan saraf / <i>neural network </i>. Program statistik yang kompleks juga sering digunakan.</p><p>Ada banyak tantangan termasuk berbagai jenis suara, dialek, dan aksen yang mungkin dihadapi oleh mesin <i>Speech Recognition.</i> Seringkali ada suara latar belakang yang perlu dihilangkan dari sinyal.</p><br>
    <p>Tantangan lainnya berasal dari <span class="highlight-word">kompleksitas bahasa manusia </span>. Ada banyak kata yang merupakan homonim, kata-kata berbeda yang terdengar sama. Memisahkan ucapan menjadi kata-kata yang terpisah itu sulit.</p>
    <br>

<img class="img-materials" src="https://www.mathworks.com/help/examples/deeplearning_shared/win64/VADInNoiseUsingDeepLearningExample_01.png" alt="Image Recognition" width="300" >     
<br>

    <p class="box-highlight"> Contoh klasik adalah bagaimana <i> "recognise speech" </i> terdengar sangat mirip dengan <i> "wreck a nice beach". </i></p> <br><p>Saat menggunakan blok dan program contoh dalam bab ini, kita sering kali akan menemui kesalahan. Ini terkadang menggelikan, terutama ketika menyebabkan program melakukan sesuatu yang konyol. Untuk aplikasi di mana kesalahan komputer dapat menyebabkan masalah serius, antarmuka dapat dibuat sehingga meminta konfirmasi sebelum melanjutkan. Menarik untuk membandingkan kesalahan <i>Speech Recognition</i> dengan jenis dan frekuensi kesalahan yang dilakukan manusia saat mendengarkan ucapan.</p>
    <br>

    <br><br>
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 52,
            'isi' => '
<p> Mesin <i>Speech Recognition</i> umumnya dapat melakukan lebih dari blok dasar <i> "listen then ..." </i>yang dijelaskan di atas. Kalian dapat menentukan bahasa yang diharapkan. Mesin dapat melaporkan hasil interim dan hasil alternatif. Ini juga dapat memberikan nilai <span class="highlight-word">"kepercayaan" atau <i>confidence </i></span> yang menunjukkan seberapa yakinnya mesin bahwa <i>Speech Recognition</i>dilakukan dengan benar. Semua fungsionalitas ini disediakan oleh blok ini:</p><p style="color: red;">
<figure class = "snap-iframe non-essential"
    id = "complex listen block"
    stage_ratio = ".75"
    container_style = "width: 1100px; height: 440px" 
    >
    <p>Argumen untuk blok ini adalah sebagai berikut (semua dapat dikosongkan):</p>
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=complex%20listen%20block&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <ol>
        <li>1. Blok yang menerima hasil interim saat mereka diproduksi.</li>
        <li>2. Blok yang menerima hasil akhir.</li>
        <li>3. Blok yang menerima kesalahan jika ada.</li>
        <li>4. Nama bahasa (dalam bahasa Inggris atau dalam bahasa itu sendiri) atau tag bahasa IETF. </li>
        <li>5. Jumlah maksimum hasil pengenalan alternatif. Jika tidak diberikan, biasanya nilainya adalah 1, meskipun mesin pengenalan dapat mengembalikan lebih sedikit hasil.</li>
        <li>6. Blok yang menerima daftar hasil pengenalan alternatif.</li>
        <li>7. Blok yang menerima daftar nilai kepercayaan yang sesuai dengan hasil pengenalan alternatif. Nilai 0 berarti tidak ada kepercayaan, sedangkan nilai 1 adalah kepercayaan tertinggi.</li>
    </ol>
    <p class="box-highlight">Sebagai contoh, jika Anda mengatakan <i> "red" </i>, Anda akan melihat <i> "red" </i>, tetapi jika segera setelahnya Anda mengatakan "a book", Anda akan melihat <i> "red" </i> menjadi <i> "read a book".</i> Anda dapat melihat fenomena yang sama pada demo Google ini.</p>
    <br>

            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 53,
            'isi' => '
    <p>Sama seperti bagian ide proyek sebelumnya, kali ini kita akan merancang ide proyek yang memanfaatkan teknologi <i>Speech Recognition</i>. Berikut adalah beberapa ide proyek menggunakan <i>Speech Recognition</i> <i>(Speech Synthesis and Recognition):</i></p>
    <ul>
        <li>1. <span class="highlight-word">Kontrol Robot: </span> Membuat robot yang merespons perintah seperti <i> "forward", "left", "right", </i> dan <i> "stop" </i></li>
        <li>2. <span class="highlight-word">Chatbot: </span>Mengembangkan chatbot yang dapat berbicara tentang topik tertentu, dengan menggunakan ucapan sebagai metode inputnya.</li>
        <li>3. <span class="highlight-word">Permainan Petualangan: </span>Mengadaptasi permainan petualangan berbasis teks menjadi program verbal di mana pemain dapat menavigasi dunia virtual dengan mengatakan perintah seperti "jalan ke utara" atau "buka pintu". </li>
        <li>4. <span class="highlight-word">Permainan Tebak-tebakan: </span>Implementasi permainan di mana komputer menebak sebuah angka atau pemain menebak angka, dengan umpan balik seperti "lebih dekat" atau "lebih jauh".</li>
        <li>5. <span class="highlight-word">Seni Interaktif: </span>Membuat karya seni interaktif yang merespons berbeda tergantung pada apakah mereka mendengar sesuatu yang positif atau negatif, dengan menggunakan deteksi kata kunci atau analisis sentimen.</li>
        <li>6. <span class="highlight-word">Integrasi Aplikasi Ucapan: </span>Menggabungkan dua aplikasi ucapan di mana satu aplikasi memproses ucapan untuk bagian-bagian ucapan (seperti kata benda, kata kerja) dan aplikasi lainnya merespons berdasarkan bagian-bagian ini.</li>
    </ul>
    <p>Buatlah ide proyekmu sendiri dan ceritakan bagaimana proyek tersebut diimpelementasikan dengan Snap Programming. Manfaatkan chatbot untuk embantu kamu merumuskan ide. Ketik "Ide proyek speech recognition" pada chatbot.</p>
    <br>


    <br><br>
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 54,
            'isi' => '
       <p class="my-2 text-center"><a href="https://developer.mozilla.org/en-US/docs/Web/API/SpeechRecognition" class="font-bold text-primary" target="_blank">Dokumentasi <i>Speech Recognition</i></a> adalah deskripsi yang sangat lengkap tentang fitur <i>Speech Recognition</i> yang seharusnya didukung oleh browser (Chrome dan Edge saat ini adalah browser tersebut tetapi pengembang browser lainnya juga sedang mengembangkannya).</p>
    <p class="my-2 text-center"><a href="https://electronics.howstuffworks.com/gadgets/high-tech-gadgets/speech-recognition.htm" class="font-bold text-primary" target="_blank"><i> How Stuff Works</i></a> memberikan penjelasan yang jelas tentang bagaimana sistem <i>Speech Recognition</i> bekerja dan apa tantangannya.</p>
    <p class="my-2 text-center"><a href="https://en.wikipedia.org/wiki/Speech_recognition" class="font-bold text-primary" target="_blank">Wikipedia</a> juga dapat dijadikan sumber karena mencakup topik ini dengan baik</p>
    <p class="my-2 text-center"><a href="https://ora.ox.ac.uk/objects/uuid:12124254-acce-4c11-a540-19e74530798d" class="font-bold text-primary" target="_blank">Antarmuka Pemrograman Ramah Anak untuk Layanan AI Cloud</a> adalah makalah yang membahas blok sintesis dan <i>Speech Recognition Snap!</i></p>
    <br>



            ',
            'xp' => 10
        ]);
        



        
        Material::create([
            'content_id' => 55,
            'isi' => '
        <p> Ayo kita belajar course lainnya, yaitu <i class="highlight-word">Image Recognition</i></p>
            <img class="img-materials" src="https://epe.brightspotcdn.com/dims4/default/3440acf/2147483647/strip/true/crop/1695x1150+13+0/resize/840x570!/quality/90/?url=https%3A%2F%2Fepe-brightspot.s3.us-east-1.amazonaws.com%2F53%2Fc9%2F8a96a2eb465e89e9d18fa364a671%2F102023-lead-image-facial-recognition-gt.jpg" alt="Image Recognition" width="300" >
    
        <br><br><br>


            ',
            'xp' => 10
        ]);



        
        Material::create([
            'content_id' => 57,
            'isi' => '
  <p>
      Tahukah kamu, sebuah kamera yang terhubung ke komputer dapat mengirimkan data warna dari setiap piksel dalam sebuah gambar? Nantinya deskripsi dari data tersebut dapat dikirim ke sebuah layanan yaitu pengenalan gambar atau kita sebut
      dengan <i><span class="highlight-word">Image Recognition </span>. Image Recognition</i> adalah kemampuan komputer untuk mengidentifikasi dan mengklasifikasi suatu deskripsi data.
    </p>
    <a style="display: block; text-align: center"><img src="https://i.imgur.com/Aqzbqsq.jpg" class="img-materials" style="width: 39mm; height: auto" /></a>
    <p>Dengan <i>Image Recognition,</i> ada banyak deskripsi yang bisa dipindai: tag-tag deskriptif, caption (judul), warna dominan, lokasi wajah dan bagian-bagian wajah jika ada, entitas terkenal, teks tulisan tangan, dan logo.</p>
    <p>
      Dalam beberapa tahun terakhir, telah terjadi kemajuan luar biasa dalam <i class="highlight-word">Computer Vision.</i> Ada sistem kinerja tinggi untuk mengidentifikasi objek, mengenali wajah, menafsirkan sketsa, dan menggunakan gambar medis untuk membantu
      diagnosis.
    </p>
    <br />
            ',
            'xp' => 10
        ]);
        Material::create([
            'content_id' => 58,
            'isi' => '
    <p>
      Untuk saat ini belum ada browser yang mendukung <i>Image Recognition.</i> Jika teman-teman menginginkan untuk mengakses layanan <i>Image Recognition</i> dari perusahaan seperti<span class="highlight-word">Google atau Microsoft</span>, kita perlu membuka akun. Akun ini
      gratis dan menyediakan beberapa tingkat penggunaan yang tidak berbayar. Microsoft mengizinkan 5000 kueri per bulan, dan Google 1000 per bulan.
    </p>
    <br />
            ',
            'xp' => 10
        ]);

        Material::create([
            'content_id' => 59,
            'isi' => '
<p class="instructions">
Blok ini mengambil gambar, mengirimkannya ke penyedia server <span class="highlight-word">Cloud AI Vision</span>, menunggu respons, dan kemudian
melaporkan daftar label dari foto tersebut.
Daftar tersebut diurutkan berdasarkan seberapa yakin penyedia vision bahwa label tersebut sesuai dengan gambar.
</p>
<figure class = "snap-iframe"
        id = "image labels reporter"
        stage_ratio = "0.25"
        container_style = "width: 800px; height: 350px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=image%20labels%20reporter&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
            ',

            'xp' => 10
        ]);

        Material::create([
            'content_id' => 60,
            'isi' => '

 <p>
      Setelah mengetahui blok sederhana <i>Image Recognition,</i> ada juga blok <i class="highlight-word">"show current photo".</i> Blok ini akan menampilkan gambar terbaru yang dikirim ke layanan visi AI tertentu sebagai latar belakang panggung Snap!. Untuk
      mencobanya, pertama-tama dapatkan beberapa label dari layanan visi. Anda juga dapat menggunakan blok <i>"use camera to create costume"</i> untuk mengambil gambar baru dan menambahkannya sebagai kostum ke <i>sprite</i> saat ini.
    </p>
<figure class = "snap-iframe"
        id = "image labels reporter and show photo"
        container_style = "width: 1000px; height: 550px" 
        iframe_style = "margin-left: -790px; margin-top: 150px;"
        >
</figure>

<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=image%20labels%20reporter%20and%20show%20photo&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
 

            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 61,
            'isi' => '
<p>
      Sebagai ilustrasi, kamu ingin melakukan percobaan dengan memberikan perintah secara lisan untuk melakukan <i>Image Recognition.</i> Kamu mengucapkan perintah seperti: "Ceritakan padaku Google apa yang kamu lihat?" dan "Apa yang kamu
      lihat Microsoft?". Ketika mendengar salah satu kata atau seluruh kata dalam kalimat tersebut, layanan <i>Speech Recognition</i> akan mulai bekerja dan bekerja sama dengan layanan <i>Image Recognition</i> akan merespon dan mulai
      melakukan pemindaian berdasarkan perintah yang diucapkan.
    </p>
    <p>Catatan: disarankan untuk mempelajari <i>Course Speech Recognition</i> agar lebih memahami bagian ini</p>
<figure class = "snap-iframe"
        id = "camera, listen, and speak no keys"
        full_screen = "true"
        container_style = "width: 800px; height: 600px" 
        >
</figure>
  <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=camera,%20listen,%20and%20speak%20no%20keys#api-keys-in-snap" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 62,
            'isi' => '
<p>
      <i>Image Recognition</i> dapat melakukan lebih dari hanya memberi label pada gambar. Beberapa dapat mendeteksi dan menemukan lokasi wajah, memperkirakan usia dan jenis kelamin orang tersebut, mengenali landmark dan logo, serta
      mengenali karakter dalam teks tulisan tangan atau yang dipindai. Dalam membuat blok Snap!, layanan yang berbeda memiliki kemampuan dan struktur tanggapan yang berbeda-beda.
    </p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 63,
            'isi' => '
<p>
      Blok <i>Recognize new photo</i> mengatasi masalah ini dengan melaporkan struktur data yang menangkap seluruh respons dari layanan visi. Ini adalah daftar Snap! yang berisi daftar yang berisi lebih banyak data yang mungkin berupa teks
      untuk label, angka untuk skor kepercayaan, dan bahkan lebih banyak daftar untuk data yang kompleks. Anda dapat mengklik dua kali ikon <img src="https://i.imgur.com/HP3NeUp.jpg" class="img-materials" /> untuk membuka daftar dalam ikon daftar untuk
      mengeksplorasi struktur lebih dalam.
    </p>
    <p>
      Blok <i class="highlight-word">"Current image property"</i> menerima argumen yang menjelaskan bagian dari struktur respons yang harus dilaporkan. Misalnya, Microsoft menawarkan keterangan yang mungkin ditemukan dengan mengikuti jalur
      <i class="highlight-word">"description captions text".</i> Blok umum yang berguna didefinisikan yang menggunakan blok <i class="highlight-word">"Current image property"</i> secara internal untuk mendapatkan label dan skor kepercayaan label untuk masing-masing penyedia layanan
      visi yang didukung. Perlu dicatat bahwa setelah respons diterima dari salah satu layanan AI, respons tersebut disimpan sehingga panggilan ke <i class="highlight-word">"Current image property"</i> menggunakan respons terbaru daripada meminta yang baru. Hal
      ini karena sebuah proyek mungkin perlu mengakses beberapa bagian dari sebuah respons.
    </p>
    <p>
      Setelah menjalankan blok <i class="highlight-word">"Recognize new photo"</i> Anda harus memilih penyedia cloud AI yang sama (saat ini Google atau Microsoft) saat menjalankan blok <i class="highlight-word">"Current image property".</i> Argumen kedua bisa berupa string atau daftar
      <i>string</i> yang menentukan informasi apa yang diinginkan dari pengenalan gambar. Setiap penyedia <i>AI Cloud</i> mendukung properti gambar yang berbeda:
    </p>
    <ul>
    <li class="box-highlight">Google. Mendukung properti yang berupa daftar dalam bentuk <i>[labelAnnotations description], [labelAnnotations score],</i> dan <i>[imagePropertiesAnnotation dominantColors colors].</i></li>
    <li class="box-highlight">Microsoft. Mendukung properti yang berupa daftar dalam bentuk <i>[Categories name], [Categories score], [Description captions text], [Description tags], Faces, [Tags name],</i> dan <i>[Tags confidence].</i></li>
    </ul>
    <p>Ayo latihan! Kenali sebuah gambar dan kemudian gunakan blok <i class="highlight-word">Current image property</i> untuk melihat jenis deskripsi apa yang disediakan oleh layanan tersebut. Bagaimana masing-masing deskripsi ini dapat berguna?</p>
    <figure class = "snap-iframe"
        id = "recognize new photo"
        container_style = "width: 800px; height: 400px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=recognize%20new%20photo&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>
      Blok reporter <i class="highlight-word">"Recognize new photo"</i> diimplementasikan menggunakan blok <i class="highlight-word">"Ask &lt;provider&gt; to say what is sees".</i> Blok ini tidak menunggu respons, melainkan menjalankan blok pengguna saat respons diterima. Ini tidak
      sepraktis "Kenali foto baru" tetapi dapat mendukung penggunaan yang lebih kompleks.
    </p>
    <figure class = "snap-iframe"
        id = "recognize asynchronous"
        container_style = "width: 800px; height: 350px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=recognize%20asynchronous&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>

    <br />
            ',

            'xp' => 10
        ]);
        
        Material::create([
            'content_id' => 64,
            'isi' => '
                <p>Pada bagian ini, kita menggunakan <i>API Keys</i> yang disediakan di area teks di atasnya. Saat membangun proyek, ada dua cara untuk menyediakan <i>key</i> atau kunci tersebut:</p>
    <ul>
      <li>
        1. Tambahkan informasi tambahan ke URL halaman. Misal menambahkan <i>&Google image key=... atau &Microsoft image key=...</i> ke URL proyek yang dibagikan akan menyediakan kunci (setelah "..." diganti dengan kunci yang sebenarnya). Kamu
        dapat menyediakan hanya satu kunci jika Anda tidak tertarik membandingkan respons dari penyedia layanan AI yang berbeda. <i>Refresh</i> halaman setelah menambahkan kunci.
      </li>
      <li>
      2. Edit satu atau kedua variabel <i class="highlight-word">global Google vision key</i> atau <i>Microsoft vision key.</i> Perhatikan bahwa variabel-variabel ini dideklarasikan sebagai sementara sehingga tidak akan disetel jika kalian menyimpan dan memuat
      proyek.
      </li>
      </ul>
      <br>
    <p>
      Karena semua layanan <i class="highlight-word">cloud AI</i> adalah layanan komersial yang apabila penggunaannya terhitung berat bisa menjadi mahal, sebaiknya setiap dari kita memiliki akun sendiri dan meminimalkan berbagi kunci. Namun sebenarnya Ini
      bertentangan dengan Scratch dan Snap! Yang sangat mudah untuk berbagi proyek seseorang dengan komunitas yang lebih luas. Dengan menambahkan kunci ke URL menyelesaikan masalah ini jika seseorang berhati-hati untuk menjaga URL dengan
      kunci tetap pribadi dan membagikan versi tanpa kunci.
    </p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 65,
            'isi' => '
              <p>
      Menurut Wikipedia, mata makhluk hidup telah berevolusi secara independen antara 50 dan 100 kali sejak hewan pertama kali muncul. Apabila kita kaitkan dengan teknologi, penglihatan komputer memungkinkan sebuah robot untuk melihat
      dengan baik, mobil yang dapat melakukan <i>self-driving,</i> dan juga dapat menjadi bantuan untuk beberapa pekerjaan seperti dokter, polisi, pelatih olahraga, petani, militer, dan lainnya.
    </p>

            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 66,
            'isi' => '
           <p>
      Seperti kebanyakan teknologi AI lainnya, <i>Image Recognition</i> ini mungkin akan mengambil alih banyak pekerjaan atau mengurangi privasi kita karena membuatnya jauh lebih mudah untuk melacak pergerakan dan aktivitas orang. Selain
      itu, teknologi ini juga dapat memungkinkan pembuatan senjata yang digunakan dalam peperangan.
    </p>
    <p>
      Bahaya lainnya adalah baik secara sengaja atau tidak sengaja, data yang digunakan untuk melatih sistem pembelajaran mesin mungkin mengandung bias. Berikut adalah video pendek yang bagus tentang bias dan pembelajaran mesin yang
      diterbitkan oleh Google.
    </p>
    <iframe
      width="560"
      height="315"
      src="https://www.youtube.com/embed/59bMh59JQDo?si=ymohEnAUhmzcL2P1"
      title="YouTube video player"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      referrerpolicy="strict-origin-when-cross-origin"
      allowfullscreen
    ></iframe>

            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 67,
            'isi' => '
                    <p>
      Seperti yang sudah disampaikan di bagian pengenalan, <i>Image Recognition</i> dimulai dengan piksel-piksel. Setiap piksel adalah angka (untuk tingkat keabuan) atau tiga angka (untuk komponen merah, hijau, dan biru) yang sesuai dengan
      bagian kecil dari sebuah gambar. Ada dua pendekatan utama dalam memproses gambar:
    </p>
    <ol>
      <li>1. Pendekatan dengan urutan langkah-langkah pemrosesan terprogram untuk menemukan tepi, menentukan tekstur, mengidentifikasi objek, dll.</li>
      <li>2. Pendekatan dengan sebuah <i>machine learning system</i></li>
    </ol>
    <p>
      Sebagian besar kemajuan telah terjadi dengan <i class="higlight-word">Machine Learning Systems.</i> Ada banyak pekerjaan yang bisa dilakukan dengan Machine Learning. Contohnya adalah untuk beberapa pekerjaan seperti mendeteksi kanker paru-paru dari
      sinar-X, <i>Machine Learning</i> telah melampaui kemampuan para ahli.
    </p>
    <a style="display: block; text-align: center"><img src="https://i.imgur.com/NcWd7ip.jpg" class="img-materials" style="width: 56mm; height: auto" /></a>
    <p>
      <i class="higlight-word">A neural net</i> adalah program yang terinspirasi dari bagaimana <i>neuron</i> dalam otak hewan dan manusia bekerja. Hal ini dapat dilatih untuk mengidentifikasi gambar. Pada kasus paling umum, <i>neural net</i> dilatih dengan
      ribuan atau jutaan gambar yang sudah diberi label. Ketika diberikan gambar baru, <i>neural net</i> menghitung label-label yang paling mungkin. Beberapa tugas diskriminasi visual yang mudah dapat diatasi dengan melatih hanya seratus
      atau kurang gambar.
    </p>
            <img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20230602113310/Neural-Networks-Architecture.png" class="img-materials" width="300" />
    <p>
      Pada suatu tingkat, neural net dapat mengenali elemen-elemen dalam suatu gambar. Para peneliti telah membangun perangkat lunak yang menentukan gambar mana yang menghasilkan respons terbesar dari berbagai lapisan. Alat interaktif yang
      sangat bagus untuk menjelajahi respons berbagai bagian dari jaringan neural adalah OpenAI Microscope.
    </p>
    <p>
      Pada suatu tingkat, <i>neural net</i> dapat mengenali element-element yang terdapat dalam suatu gambar. Para peneliti telah membangun perangkat lunak yang menentukan gambar mana yang menghasilkan respons terbesar dari berbagai
      lapisan. Alat interaktif yang sangat bagus untuk menjelajahi respons berbagai bagian dari jaringan <i>neural</i> adalah <i>OpenAI Microscope.</i>
    </p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 68,
            'isi' => '
                 <p>
      Beberapa penyedia layanan AI cloud seperti Google dapat menerima saluran video dan menghasilkan label. Layanan ini juga dapat mendeteksi perubahan adegan. Layanan ini bisa mahal, namun Google akan menganalisis 1000 menit video per
      bulan tanpa biaya. Namun perlu diketahui saat ini, belum ada blok Snap! yang mendukung input video.
    </p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 69,
            'isi' => '
      <p>
      Menambahkan <i>Image Recognition</i> ke proyek robotika dapat membuat robot berperilaku jauh lebih cerdas. Robot dapat menuju tujuan dan menghindari objek tertentu. Contoh sederhana ialah robot yang diberitahu untuk bergerak ke X
      (misalkan X berupa "bola merah", "truk mainan", "seseorang", atau apa pun). Robot dimulai dengan mengirimkan gambar kamera saat ini untuk dikenali. Jika deskripsi yang dikembalikan cocok dengan X, maka bergerak maju beberapa langkah
      (dengan asumsi kamera dipasang menghadap ke depan). Jika tidak, maka berputar sedikit dan coba lagi. Ulangi sampai X tercapai.
    </p>
    <p>Untuk proyek yang menggunakan kamera yang tidak dapat bergerak, ada banyak kemungkinan:</p>
    <ul>
      <li>Melakukan percakapan sederhana tentang apa yang menurutnya dilihatnya.</li>
      <li>
        Merespons apa yang dilihatnya. Misalnya, mengatakan "sangat lucu" ketika deskripsi mencakup kata-kata seperti "anak kucing" atau "anak anjing" tetapi mengatakan "Sangat menakutkan!" ketika deskripsi adalah mainan singa atau
        serigala.
      </li>
      <li>Ketika wajah dikenali, lokasi dan lokasi bagian-bagian wajah termasuk dalam respons. Aplikasi kemudian dapat mengetahui di mana menempatkan kacamata, kumis, dll. pada gambar.</li>
      <li>Dan ribuan kemungkinan lainnya.</li>
    </ul>
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 70,
            'isi' => '
      <p>
      <i>Google</i> dan <i>Microsoft</i> mendokumentasikan layanan visi AI mereka. Ada banyak layanan visi lainnya, lihat contohnya halaman perbandingan layanan <i>Image Recognition</i> ini. Halaman <i>Wikipedia</i> tentang visi komputer
      sangat komprehensif. Ada banyak MOOCs tentang visi komputer dan pembelajaran mesin untuk pengenalan gambar. <i>Distill</i> adalah jurnal ilmiah yang berusaha menjelaskan secara jelas topik-topik pembelajaran mesin yang kompleks.
      Sebuah artikel <i>Distill</i> adalah deskripsi mendalam tentang bagaimana jaringan saraf melakukan pengenalan gambar. Ringkasan untuk audiens umum dari artikel tersebut ditulis oleh New York Times. <i>Codecademy</i> memiliki wawancara
      yang baik dengan seorang ilmuwan data tentang pembelajaran mesin.
    </p>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 71,
            'isi' => '
  <p>Kamu dapat mengimpor blok-blok yang disajikan di sini sebagai sebuah proyek atau mengunduhnya sebagai perpustakaan untuk diimpor ke dalam proyek-proyek kamu.</p>
    <b><a rel="noreferrer" target="_new" href="https://ecraft2learn.github.io/ai/snap/snap.html?project=seeing&editMode ">KLIK DISINI!!!</a></b>
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 72,
            'isi' => '
<p>Ayo kita belajar <i>course</i> lain yaitu <span class="highlight-word"> Machine Learning </span></p>
<img class="img-materials" src="https://atriainnovation.com/uploads/2023/11/portada-9.jpg" alt="Machine Learning" width="300" >
    <br />
            ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 74,
            'isi' => '
               <p>Pada bagian panduan ini, cukup banyak mencakup elemen interaktif yang dapat berjalan baik di <i class="highlight-word">browser chrome</i> atau <i class="highlight-word">edge</i></p>
               <img class="img-materials" src="https://www.debugbar.com/wp-content/uploads/2021/03/Capture.png" alt="Troubleshooting Guide" width="300" />
    <p>Untuk mengetahui cara mengatasi masalah yang dihadapi dapat dilihat <i>troubleshooting guide</i> sebagai panduan pemecahan.</p>
    <br>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 75,
            'isi' => '

    <p>Program AI dapat melakukan banyak hal dengan teks, termasuk :<br>
        1. menjawab pertanyaan (penanganan penelusuran web yang lebih cerdas) <br>
        2. merangkum teks <br>
        3. mendeteksi sentimen teks (positif/negatif, senang/sedih, marah)<br>
        4. penulisan teks (banyak artikel berita olahraga dan keuangan ditulis oleh komputer saat ini)<br>
        5. menentukan struktur gramatikal suatu kalimat<br>
        6. menerjemahkan antar bahasa<br>
    </p>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 76,
            'isi' => '
<p>Meskipun komputer dapat menangani teks sebagai rangkaian karakter, teknik yang disebut penyematan kata bekerja dengan mengubah kata menjadi <span class="highlight-word">daftar angka yang panjang.</span></p>
    <p>Angka-angka ini dapat dibuat oleh manusia, yang mana setiap angka memiliki arti seperti ukuran minimum, ukuran maksimum, atau harapan hidup rata-rata.</p>
    <p>Kebanyakan program AI menggunakan angka-angka yang dihasilkan oleh pembelajaran mesin. Angka-angka tersebut dibuat dengan melatih model pembelajaran mesin pada miliaran kata (misalnya, semua halaman <i>wikipedia</i> dalam bahasa tertentu).</p>
    <p>Orang-orang tidak memahami apa arti angka-angka tersebut tetapi kata-kata yang mirip memiliki angka yang sama dan kata-kata yang tidak berhubungan memiliki angka yang sangat berbeda</p> 
    <p>Setiap angka mengukur fitur dari kata tersebut tetapi fitur tersebut masih merupakan sebuah misteri. Kata <span class="highlight-word">embeddings</span> yang digunakan dalam bab ini dibuat oleh para peneliti di  <i>researchers at Facebook</i>. Mereka melatih model pembelajaran mesin mereka dalam 157 bahasa berbeda di semua artikel <i>Wikipedia</i> dalam setiap bahasa. Meskipun masing-masing kata itu tidak cukup, mereka juga melatih model mereka pada puluhan miliar kata lagi yang ditemukan <i>crawling the web..</i> Mereka membuat tabel untuk setiap bahasa yang berisi setidaknya satu juta kata berbeda. Blok yang dijelaskan di sini menyediakan 20.000 kata paling umum untuk 15 bahasa (Cina, Inggris, Finlandia, Prancis, Jerman, Yunani, Hindi, Indonesia, Italia, Jepang, Lituania, Portugis, Sinhala, Spanyol, dan Swedia). (Tabel yang lebih besar dan lebih banyak bahasa dapat ditambahkan. Kirim permintaan ke <i>toontalk@gmail.com.</i>)</p>      

    ',

            'xp' => 10
        ]);


        Material::create([
            'content_id' => 77,
            'isi' => '
 <p>Kami telah membuat Snap! blok untuk mengeksplorasi bagaimana penyematan kata dapat digunakan untuk menemukan kata-kata yang serupa, kata-kata yang berada di antara kata-kata lain, dan yang paling mengejutkan memecahkan masalah analogi kata. </p>
 <p>Fitur blok kata akan melaporkan daftar 300 angka. Jika kolom bahasa dibiarkan kosong, bahasa <i>default</i> akan digunakan. Anda dapat menganggap angka-angka tersebut seperti menempatkan sebuah kata dalam ruang 300 dimensi. Jumlahnya disesuaikan sehingga seluruh 20.000 kata masuk ke dalam <i>hypersphere</i> 300 dimensi dengan radius 1. </p>
 <P>Ada database dengan penyematan kata untuk satu juta kata tetapi memuat dan mencari kumpulan data sebesar itu akan sangat lambat. Fitur blok kata didasarkan pada 20.000 entri yang paling sering muncul berupa huruf kecil (tanpa kata benda) dan hanya berisi huruf (tanpa tanda baca atau angka).</P>
<figure class = "snap-iframe"
        id = "features of"
        container_style = "width: 550px; height: 600px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=features%20of&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 78,
            'isi' => '
 
                    <p>Sebuah program dapat mencari seluruh kata untuk menemukan kata yang paling dekat dengan daftar angka. Kata yang paling dekat dengan blok reporter melakukan hal ini.    </p>
<figure class = "snap-iframe"
        id = "closest word to"
        container_style = "width: 800px; height: 500px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=closest%20word%20to&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>Menemukan kata yang paling dekat dengan sebuah kata. COBALAH! Kemudian coba lagi setelah mengubahnya ke bahasa yang Anda tahu.</p>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 79,
            'isi' => '
     <p>Anda dapat mengambil dua kata dan menghitung rata-rata ciri-cirinya dengan menjumlahkan angka-angka yang sesuai dan membagi hasilnya dengan angka2. Anda kemudian dapat menggunakan kata yang paling dekat dengan pelapor untuk menemukan kata yang paling mendekati rata-rata.</p>
            <figure class = "snap-iframe"
        id = "word average"
        container_style = "width: 750px; height: 300px" 
        ">
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=closest%20word%20to&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>Cobalah membuat rata-rata lebih dari dua kata. Dan lihat kata apa yang paling dekat antara dua kata selain titik tengahnya.</p>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 80,
            'isi' => '
     <p>Salah satu hal yang paling mengejutkan tentang penyematan kata adalah dengan rumus yang tepat, seseorang dapat menyelesaikan masalah analogi kata. Misalnya, "laki-laki bagi perempuan adalah raja bagi apa?" dapat dinyatakan sebagai "raja+(wanita-pria)=x"</p>
            <figure class = "snap-iframe"
        id = "word analogy"
        container_style = "width: 850px; height: 550px" 
        ">
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=word%20analogy&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <p>Memecahkan masalah analogi kata. COBALAH! Kemudian temukan analogi lain yang berhasil.</p>
     <p>Perhatikan bahwa "raja bagi laki-laki dan perempuan bagi apa?" dapat dinyatakan sebagai "wanita+(raja-pria)=x". Dan "raja+(wanita-pria)=x" dan "wanita+(raja-pria)=x" adalah setara namun memecahkan masalah analogi kata yang berbeda!</p>
     <p>Penggunaan penyematan kata ini juga berfungsi untuk analogi tata bahasa. Coba pecahkan "lambat menjadi lebih lambat dan cepat menjadi apa?". Anda mungkin perlu menambahkan "cepat" sebagai pengecualian.</p>
     <p>Kami telah menerbitkan beberapa makalah tentang penggunaan penyematan kata.Lihatlah <i>our publications</i>.</p>
     <p>Perhatikan bahwa untuk analogi kata dalam bentuk A ke B dan C ke D, jarak antara A-B ke C-D jauh lebih kecil dibandingkan jika A, B, C, dan D hanyalah kata-kata yang dipilih secara acak. Seseorang dapat menelusuri daftar kata dengan memilih empat kata dan mengukur jarak antara perbedaan antara pasangan kata. Jika seseorang hanya menyimpannya di tempat yang jaraknya kecil, dia mungkin akan menemukan teka-teki analogi kata baru. Namun, jika seseorang melakukan ini dengan menelusuri 20.000 kata, maka 3.998.800.199.970.000 kombinasi harus dipertimbangkan. <i>project that enables one to search through a smaller set</i>.</p>

    ',

            'xp' => 10
        ]);

        Material::create([
            'content_id' => 81,
            'isi' => '
          <p>Jika Anda menggunakan kata yang paling dekat dengan reporter untuk mengurutkan semua kata berdasarkan jarak ke daftar fitur, ini akan memakan waktu sekitar satu hari penuh karena harus memanggil reporter sebanyak 20.000 kali. Sebagai gantinya, kami memberikan kata yang paling mirip dengan reporter (perhatikan bentuk jamaknya) yang melakukan semuanya sekaligus dalam waktu kurang dari satu detik jika perangkat memiliki <i>GPU</i> (kecuali saat pertama kali dipanggil, mungkin diperlukan waktu beberapa detik). Secara opsional, ia juga dapat melaporkan jarak sebagai kosinus.</p>  
            <figure class = "snap-iframe"
        id = "sort closest words"
        container_style = "width: 900px; height: 500px" 
       >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=sort%20closest%20words&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <P>Meskipun seseorang jarang membutuhkan 20.000 kata, mungkin menarik untuk membandingkan dua kata dengan melihat berapa banyak dari 100 atau 500 kata terdekat yang memiliki kesamaan. Pikirkan kegunaan lain dari reporter ini.</P>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 82,
            'isi' => '
              <P>Fitur yang paling dekat dengan daftar fitur, blok laporan fitur mana yang paling dekat dengan daftar fitur tertentu. Ini melaporkan daftar semua fitur yang terdaftar, diurutkan berdasarkan jaraknya ke fitur tertentu. Kesamaan kosinus juga dilaporkan. Blok ini berfungsi baik dengan penyematan kata, kalimat, atau gambar. Atau tabel data seperti gambar di bawah ini. Perhatikan bahwa nilainya harus berada dalam rentang yang sama. (Berat diberikan dalam jumlah ratusan kilogram karena alasan ini.)</P>
            <figure class = "snap-iframe"
        id = "sort closest features"
        container_style = "width: 800px; height: 500px" 
       >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=sort%20closest%20features&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <P>Temukan semua fitur yang paling dekat dengan daftar fitur. COBALAH!</P>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 83,
            'isi' => '
                  <P>Seseorang dapat menghitung <i>embedding</i> kalimat dengan merata-ratakan semua kata dalam sebuah kalimat. Namun, ada cara yang jauh lebih baik dengan menggunakan model yang dilatih untuk menangani tugas tingkat kalimat.</P>
     <P><i>Universal Sentence Encoder</i> adalah salah satu model yang tersedia di <i>browser</i>. Para reporter mendapatkan fitur kalimat dan mendapatkan fitur kalimat menggunakan <i>Universal</i> <i>Sentence Encoder</i> ini untuk menghasilkan 512 angka untuk kalimat apa pun. (Benar-benar rangkaian kata apa pun, tidak harus berupa kalimat tata bahasa.)</P>
    <p>Ini dapat digunakan untuk mengukur seberapa mirip dua kalimat. Mempertimbangkan</p>
    <div class="box-highlight">
        <ol>A.Apa kabarmu? </ol>
        <ol>B.Berapa umurmu?</ol>
        <ol>C.Berapa umur anda?</ol>
        <ol>A dan B mempunyai banyak kata yang sama tetapi B dan C mempunyai arti yang mirip.</ol>
    </div>
    <p>Fitur mendapatkan kalimat, Blok menerima teks multi-kata dan melaporkan daftar 512 angka. Untuk membandingkan kalimat kami, menggunakan kesamaan kosinus yang biasanya bekerja lebih baik daripada jarak <i>Euclidean</i>. Menggunakan <i>arc cosinus</i> mengubah kesamaan kosinus menjadi sudut untuk kejelasan.</p>
            <figure class = "snap-iframe"
        id = "sentence embedding"
        container_style = "width: 900px; height: 500px"
            >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=sentence%20embedding&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>

    <p>Ide penggunaan <i>embedding</i> kalimat untuk menentukan kalimat mana yang lebih dekat dengan kalimat lain dapat menjadi dasar dari sebuah permainan.</p>
    <figure class = "snap-iframe"
        id = "sentence game" 
        full_screen = "true"
        container_style = "width: 900px; height: 500px"
        caption = "Sebuah permainan menemukan kalimat terdekat ">
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=sentence%20game&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>Pengkodean kalimat dapat digunakan lebih dari sekadar membandingkan kalimat. Dikombinasikan dengan model pembelajaran mendalam (lihat bab tentang  <i>chapter on creating, training, and using machine learning models</i>), model tersebut dapat digunakan untuk melatih sistem guna mendeteksi sentimen, emosi, topik, dan banyak lagi.</p>    

        <figure class = "snap-iframe"
        id = "confidence guesser"
        full_screen = "true"
        container_style = "width: 900px; height: 500px"
       >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=confidence%20guesser&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <p>Versi layar penuh dari program ini dapat ditemukan  <i>found here</i>. Model pembelajaran mesin yang digunakan dilatih dalam <i>project</i> ini.</p>
    <p>Alternatif fitur blok kalimat adalah yang menggunakan <i>GPT-3</i> versi kecil dari <i>OpenAI</i>. Layanan ini menyediakan penyematan nomor 1536 dan mungkin memiliki kualitas yang jauh lebih tinggi. <i>API key</i> dari <i>OpenAI</i> diperlukan. Pengguna baru mendapatkan kredit gratis sebesar $18 dan layanan ini sangat murah (satu dolar AS akan mencakup pembuatan embeddings untuk lebih dari satu juta kata).</p>
    <img src="assets/10.png" alt="" style="width: 40%;">
    <p>Menggunakan GPT-3 untuk menghasilkan penyematan kali</p>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 84,
            'isi' => '
                <P>Salah satu penggunaan penyematan kalimat adalah pengambilan informasi. Pertimbangkan tugas mencari Snap! manual atau panduan pemrograman AI ini. Pencocokan <i>string</i> tidak dapat memperhitungkan sinonim, cara berbeda untuk mengatakan hal yang sama, atau konvensi ejaan yang berbeda.  <i>this sample search project</i>, penyematan kalimat digunakan untuk membandingkan kueri pengguna dengan fragmen kalimat dari manual dan panduan.</P>
    <p>Dengan features closest to list of features block fragmen terdekat ditemukan dengan sangat cepat. Penyematan semua fragmen telah dihitung sebelumnya sehingga hanya penyematan kueri pengguna yang diperlukan. Setelah fragmen terdekat telah dihitung, kita dapat kembali melakukan pencarian string karena fragmen tersebut berasal dari dokumen yang sedang dicari.</p>
    <p>Seseorang dapat menggunakan pencarian yang ditambah AI ini saat bekerja dengan Snap! dengan mengunduh dan mengimpor pencarian panduan pemrograman AI atau Snap! pencarian manual. Mereka bekerja dengan cara yang sama dan memiliki antarmuka yang serupa. Hasilnya cenderung lebih baik jika kuerinya berupa frasa tata bahasa dan bukan pertanyaan.</p>
    <div class="box-highlight">
    <p>Panduan pemrograman mendukung perintah keyboard berikut:</p>
        <ol>g - untuk memasukkan permintaan pencarian ke panduan</ol>
        <ol>t - bertanya dengan berbicara</ol>
        <ol>x - untuk berhenti mendengarkan pertanyaan</ol>
    </div>
    <div class="box-highlight">
    <p>Jepretannya! manual mendukung perintah keyboard ini:</p>
        <ol>m - untuk memasukkan permintaan pencarian ke manual</ol>
        <ol>s - untuk mengucapkan pertanyaan</ol>
        <ol>x - untuk berhenti mendengarkan pertanyaan</ol>
    </div>
    <p>Pencarian manual dan panduan dapat diimpor ke proyek yang sama. Namun jangan keduanya mendengarkan pidato Anda secara bersamaan. Bila Anda tidak lagi memerlukan bantuan ini, hapus saja sprite yang diimpor.</p>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 85,
            'isi' => '
                     <p>Akan menyenangkan untuk memvisualisasikan 300 angka yang terkait dengan sebuah kata. Salah satu caranya adalah dengan menggambar rangkaian garis vertikal, satu garis untuk setiap fitur.</p>
            <figure class = "snap-iframe"
        id = "draw word embedding"
        full_screen = "true"
        container_style = "width: 1000px; height: 500px"
        >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=draw%20word%20embedding&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>

     <p>Versi layar penuh dari program ini dapat ditemukan di sini. Lihat apakah Anda dapat membuat cara lain untuk memvisualisasikan <i> embedding </i> . Misalnya, untuk membandingkan dua penyematan, mungkin visualisasinya harus disisipkan.</p>
 
    ',

            'xp' => 10
        ]);

        Material::create([
            'content_id' => 86,
            'isi' => '
       <p>Tidak ada yang bisa memvisualisasikan ruang 300 dimensi. Ada teknik untuk memberikan kesan hubungan antara titik-titik berdimensi sangat tinggi dengan memetakan titik-titik tersebut ke dua atau tiga dimensi. Kami menggunakan teknik yang disebut  <i>t-SNE</i>. Hal ini dapat dipahami sebagai simulasi fisika di mana semua titik di daerah padat saling tolak menolak dan semua titik tertarik ke titik yang jaraknya kecil (dalam ruang berdimensi tinggi). data projector menampilkan 20.000 kata bahasa Inggris dalam dua atau tiga dimensi menggunakan <i>t-SNE</i>, <i>PCA (principal component analysis)</i>, atau  <i>UMAP</i>. Anda juga dapat menggunakan proyektor untuk melihat penyematan kata dalam bahasa berikut:<i>German, Greek, Spanish, French, Finnish, Hindi, Indonesian, Italian, Japanese, Lithuanian, Portuguese, Sinhalese, Swedish, and Chinese</i></p>
    <p>Perhatikan bahwa dibutuhkan beberapa ratus iterasi t-SNE sebelum dapat menghasilkan pemetaan yang baik dari 300 dimensi. Anda juga dapat mencari kata dan tetangganya serta membuat bookmark. Tautan di atas meluncurkan proyektor dengan penanda yang menunjukkan t-SNE dan menyorot seratus kata yang mendekati "anjing".</p>
    <img src="/materials/12.png" alt="" style="width: 40%;" class="img-materials" >
    <P>Di pojok kanan bawah, Anda dapat memilih penanda proyektor</P>
    <p>Berikut adalah program yang menampilkan 50 kata acak di lokasi yang dihasilkan oleh t-SNE. </p>   
    <figure class = "snap-iframe"
        id = "random word locations"
        full_screen = "true"
        container_style = "width: 1000px; height: 800px" 
        >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=random%20word%20locations&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    <P>Berulang kali mengambil sebuah kata dan menampilkannya di lokasi t-SNE-nya. COBALAH!</P>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 87,
            'isi' => '
           <p>Blok fitur kalimat dan fitur kalimat dapat mengubah kalimat menjadi titik dalam ruang 512 dimensi. <i>Learn more here</i>. Meskipun kita tidak dapat memvisualisasikan ruang ini, ada teknik untuk memetakan titik-titik ini ke dalam 2 atau 3 dimensi yang, meskipun merupakan perkiraan, seringkali memberikan wawasan. <i>TensorFlow Projector</i> mengimplementasikan beberapa teknik serupa di halaman web. Proyektor memerlukan dua file: satu dengan penyematan kalimat (yaitu lokasi di ruang 512D) dan yang lainnya mengaitkan teks kalimat dengan penyematan.</p>
     <p>Blok <sentences> to TSV melaporkan konten file embeddings dan blok <sentences> to TSV metadata melaporkan konten file metadata. Blok-blok ini dan contoh sepele penggunaannya dapat ditemukan di proyek <i>generate projector files</i> . Setelah blok ini dijalankan dan hasilnya diekspor sebagai file TSV, Anda dapat meluncurkan Proyektor  <i>TensorFlow Projector</i> dan mengklik tombol Muat untuk memuat file Anda ke dalam proyektor.</p>
    <p>Contoh penggunaan blok ini adalah penerapan <i>application of the TensorFlow Projector to the sentences in the Snap! manual..</i>> Setelah menjelajahinya, kami sarankan Anda mengklik <i>bookmark APL</i> untuk melihat seseorang menggunakan proyeksi ini.</p>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 88,
            'isi' => '
     <p>Apa yang akan terjadi jika Anda mengambil, misalnya, ciri-ciri kata "anjing" dalam bahasa Inggris dan menanyakan kata yang paling mendekati, misalnya, dalam bahasa Prancis? Cobalah ini dengan bahasa sumber dan target yang berbeda serta kata-kata yang berbeda. Bandingkan dengan <i>Google Translate.</i>  Tip: mudah untuk menyalin dan menempelkan kata-kata yang tidak dapat diketik oleh keyboard Anda dari halaman <i>Google Translate..</i> Atau Anda dapat menggunakan  <i>input method editor</i> yang didukung oleh sistem operasi perangkat Anda. Bahasa yang didukung adalah China, Inggris, Finlandia, Prancis, Jerman, Yunani, Hindi, Indonesia, Italia, Jepang, Lituania, Portugis, Sinhala, Spanyol, dan Swedia.</p>
     <figure class = "snap-iframe"
        id = "translate exercise"
        container_style = "width: 800px; height: 460px" 
        >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=translate%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <p>Temukan kata terdekat dalam bahasa lain.</p>
     <p>Perhatikan bahwa versi kata terdekat ini memiliki pilihan bagaimana seseorang mengukur jarak antara dua vektor.  <i>Euclidean distance</i> adalah ukuran jarak 2D yang lazim. <i>Cosine similarity</i> serupa tetapi lebih disukai oleh para ahli. Lihat apakah ada bedanya kata mana yang paling dekat dengan kata yang belum diterjemahkan.</p>

    ',

            'xp' => 10
        ]);

        Material::create([
            'content_id' => 89,
            'isi' => '
 <p>Permainan berikut memilih kata acak dan memberikan umpan balik yang lebih hangat atau lebih dingin kepada pemain saat pemain menebak. Caranya dengan membandingkan jarak kata rahasia dengan jarak sebelumnya. Ia menggunakan lokasi ... blok reporter untuk menampilkan tebakan Anda. Permainan ini sangat sulit! Ada banyak cara untuk membuat permainan menjadi lebih baik. Lihat apakah Anda bisa!</p>
     <figure class = "snap-iframe"
        id = "guess my word"
        full_screen = "true"
        container_style = "width: 800px; height: 800px" 
        >
</figure>

            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=guess%20my%20word&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    
     
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 90,
            'isi' => '
<p>Peneliti pemrosesan bahasa alami telah melatih model untuk mengatasi tugas tingkat kalimat seperti menjawab pertanyaan. Mereka memiliki nama <i>Sesame Street</i>  seperti Elmo, Bert, dan Ernie. Bert (sebenarnya BERT yang merupakan singkatan dari Representasi Encoder Dua Arah dari Transformers) telah tersedia untuk <i>browser</i>.</p>
     <P>BERT digunakan dalam implementasi dapatkan hingga 5 jawaban tanya jawab ... menggunakan blok bagian ini. Dengan adanya satu bagian teks (biasanya satu halaman atau kurang), mereka dapat menjawab pertanyaan tentang isinya. Blok pertanyaan dapatkan hingga 5 jawaban melaporkan daftar yang elemennya berupa daftar jawaban dan skor yang menunjukkan seberapa yakin model tersebut. Cara mudah untuk mengimpor bagian ke Snap! adalah menyeret file yang berisi teks biasa ke area skrip</P>
            <figure class = "snap-iframe"
        id = "question answer"
        full_screen = "true"
        container_style = "width: 800px; height: 800px" 
    >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=question%20answer&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <P>Ajukan pertanyaan tentang bagian teks yang menjelaskan Snap!. COBALAH!</P>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 91,
            'isi' => '
    <P>GPT-3 adalah model jaringan saraf yang mampu menghasilkan teks sebagai respons terhadap perintah. Hal yang mengesankan adalah seberapa sering teks yang dihasilkan sangat tepat baik itu menjawab pertanyaan, memperbaiki tata bahasa kalimat, merangkum teks, atau mengikuti instruksi. GPT-3 dilatih mengenai ratusan miliar kata dari halaman web dan buku. Anehnya, "satu-satunya" hal yang dipelajarinya adalah memprediksi kata berikutnya (atau token yang terkadang merupakan bagian dari sebuah kata). Orang menyebut model seperti ini “model bahasa”.</P>
     <p>Anda dapat mengakses GPT-3 dari Snap! menggunakan blok lengkap menggunakan GPT-3.... Anda harus menyediakannya dengan <i> OpenAI GPT-3 API key</i>. Ia menerima banyak <i>options supported by the OpenAI API</i>.</p>
    <p><i>AI21 Studios</i> telah merilis model mirip dengan GPT-3 yang disebut Jurassic 1 seperti yang dimiliki <i>Cohere</i>. Blok lengkap menggunakan Jurassic 1 ... dan lengkap menggunakan <i>Cohere</i> ... berfungsi sangat mirip dengan versi GPT-3. Anda perlu mendapatkan  <i>AI21 Studios or Cohere</i>. Jurassic 1 and Cohere model. Opsi model Jurassic 1 dan Cohere juga mirip dengan opsi GPT-3 tetapi perhatikan bahwa opsi tersebut diterapkan oleh sekumpulan reporter paralel yang diakhiri dengan "(J1)" atau "(Cohere)". Ada juga opsi reporter umum yang dapat ditemukan di Snap "Model bahasa"! Kategori.</p>
            <figure class = "snap-iframe"
        id = "language model demo"
        container_style = "width: 800px; height: 880px" 
        >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=language%20model%20demo&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>



    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 92,
            'isi' => '
         <p>GPT-3, Jurassic 1, or Cohere Gopher adalah contoh program yang mencoba mengadakan percakapan menggunakan GPT-3, Jurassic 1, atau Cohere. Ia menggunakan <i>speech recognition</i> untuk mendengarkan apa yang Anda katakan. Apa yang Anda ucapkan ditambahkan ke perintah yang mencoba membuat GPT-3 menjadi pembicara yang baik dengan menjelaskan situasinya dan memberikan beberapa percakapan. Hal ini menghindari masalah seiring berjalannya percakapan, perintah menjadi terlalu panjang untuk GPT-3 dengan memotongnya sambil mempertahankan deskripsi konteks. Baca <i>Conversations with and between personas using language models</i> untuk mempelajari lebih lanjut.</p>
    <p>Proyek ini mendukung beberapa "persona". Gopher adalah upaya untuk menjadi pembicara umum yang ramah. El diminta untuk berpura-pura menjadi gajah sehingga seseorang dapat menanyakan pertanyaan seperti "Apa makanan favoritmu?" atau "Apakah kamu suka jogging?". Hawa berpura-pura menjadi Gunung Everest. Ajukan pertanyaan seperti "Berapa berat badanmu?" atau "Bagaimana saya bisa datang mengunjungi Anda?". Charles adalah simulasi sederhana dari Charles Darwin. Tanyakan padanya tentang kehidupannya, evolusinya, atau bukunya. Contrarian suka berdebat sedangkan Curiosity sangat ingin tahu. Persona yang berbeda ini menjalankan skrip yang sama. Perbedaannya hanya pada teks pengantar dan contoh percakapan awal. Mereka bahkan dapat berbicara satu sama lain!</p>
    <p>Perhatikan bahwa proyek ini juga mengilustrasikan bagaimana seseorang dapat membuat antarmuka yang sepenuhnya berorientasi pada ucapan. Selain komunikasi <i>API key</i> Anda, semuanya menggunakan input dan output ucapan. Hal ini sangat berguna ketika proyek dijalankan pada ponsel pintar. Lihatlah skrip untuk melihat cara kerjanya.</p>
    


    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 93,
            'isi' => '
             <p>Debate adalah contoh program yang menggunakan model bahasa dari <i>OpenAI</i>, <i>AI21 Studios, or Cohere</i>  untuk menghasilkan transkrip debat virtual tentang topik apa pun. Baca posting ini untuk mempelajari lebih lanjut</p> 

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 94,
            'isi' => '
                <p><i>Turtle command generator</i>  adalah contoh program yang menggunakan GPT-3 untuk mengontrol gerakan sprite. Ia bekerja dengan membuat GPT-3 menghasilkan perintah Logo turtle sebagai respons terhadap instruksi lisan atau ketikan. Perintah-perintah itu kemudian diubah menjadi Snap! blok. Baca post ini untuk mempelajari lebih lanjut.</p>  
     <img src="assets/18.png" alt="" style="width: 40%;">
     <p>Lihat bagaimana seseorang mendapatkan model bahasa untuk menghasilkan perintah gerakan</p>
     <p>Anda dapat menghentikan proyek dan menjalankan perintah log ke blok untuk mengubah riwayat interaksi Anda menjadi Snap! blok. Misalnya,</p>
            <figure class = "snap-iframe"
        id = "language model to turtle commands"
        full_screen = "true"
        container_style = "width: 800px; height: 800px" 
        >
        <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=language%20model%20to%20turtle%20commands&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
</figure>
     
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 95,
            'isi' => '
                    <p>Blok Minta DALLE-2 untuk membuat ... kostum ... dapat digunakan untuk menghasilkan kostum. Dengan <i>API key from OpenAI </i> seseorang dapat menggunakan blok ini untuk menghasilkan kostum (dengan biaya masing-masing 2 sen AS atau kurang). Deskripsi kostum Anda dapat mencakup medium (cat air, foto, kaca patri, lukisan cat minyak, dll.), gaya (seperti Simpsons, Studio Ghibli, Rembrandt, Picasso, Cezanne, dll.), pencahayaan, sudut pandang, dll. Pelajari lebih lanjut tentang DALL-E -2 here. </p>
            <figure class = "snap-iframe"
        id = "dalle-2 exercise"
        container_style = "width: 850px; height: 200px" 
    >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=dalle-2%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
            
     <p>DALL-E-2 demo project ini meminta deskripsi dan membuat dua kostum, menambahkannya ke sprite, lalu memudar masuk dan keluar di antara keduanya. Ini juga menunjukkan cara mengganti warna (dalam hal ini putih) dengan transparansi.     </p>

    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 96,
            'isi' => '
                       <p>Blok Tanya ... untuk membuat kostum yang dideskripsikan sebagai ... dapat menggunakan<i>Stable Diffusion text-to-image model or DALLE-2</i> untuk menghasilkan gambar.</p> 
    <img src="assets/22.png" alt="" style="width: 40%;"> 
    <p>Sebuah blok untuk menghasilkan kostum sebagai respons terhadap teks menggunakan Stanble Diffusion  atau DALLE-2</p>
            <figure class = "snap-iframe"
        id = "Stable Diffusion exercise"
        full_screen = "true"
        edit_mode = "true"
        container_style = "width: 1200px; height: 600px" 
    >
</figure> 
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=Stable%20Diffusion%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 97,
            'isi' => '
<p class="instructions">
Blok <span class="block-name">Ask ... to create a costume described as ...</span> dapat menggunakan model teks-ke-gambar <a href="https://stability.ai/" target="_blank">Stable Diffusion</a> atau <a href="https://openai.com/dall-e-2/" target="_blank">DALLE-2</a> untuk menghasilkan gambar.
</p>

<figure class = "snap-iframe"
        id = "Generic text-to-image exercise"
        full_screen = "true"
        edit_mode = "true"
        container_style = "width: 1200px; height: 600px" 
    >
</figure> 
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=Generic%20text-to-image%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 98,
            'isi' => '
     <p>Blok Minta DALLE-2 untuk membuat ... kostum sebagai varian kostum ... dapat digunakan untuk membuat varian kostum. Lebar dan tinggi kostum harus sama.</p>
<figure class = "snap-iframe"
        id = "Generic text-to-image exercise"
        full_screen = "true"
        edit_mode = "true"
        container_style = "width: 1200px; height: 600px" 
    >
</figure> 
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=Generic%20text-to-image%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <p>Sebuah blok untuk menghasilkan kostum varian</p>
    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 99,
            'isi' => '
     <p>Blok Minta DALLE-2 untuk membuat ... kostum sebagai pengeditan kostum ... dapat digunakan untuk mengedit kostum. Lebar dan tinggi kostum serta kostum "topeng" harus sama. "Kostum topeng" harus memiliki piksel transparan yang akan diganti tergantung perintah yang diberikan.</p>
            <figure class = "snap-iframe"
        id = "dalle-2 variant exercise"
        full_screen = "true"
        edit_mode = "true"
        container_style = "width: 1050px; height: 500px" 
    >
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=dalle-2%20variant%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <p>Sebuah blok untuk mengedit kostum</p>
     <p><i>sample project</i> ini menggabungkan varian DALL-E dan blok pengeditan dengan <i>the computer vision segmentation block</i>. Proyek ini mengambil foto seseorang, membuat varian, menggunakan segmentasi untuk membuat topeng latar belakang, dan pengeditan DALL-E untuk mengubah latar belakang sesuai dengan perintah yang dimasukkan.</p>
   
    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 100,
            'isi' => '
                 <p><i>Hugging Face</i> menyediakan akses ke lebih dari 15.000 model jaringan saraf. Tersedia kunci API gratis yang dibatasi hingga 30.000 karakter input per bulan saat berkomunikasi dengan model berbasis teks. Masukan tambahan dikenakan biaya $10 per juta karakter. Lihat <i>Hugging Face pricing</i>. </p>  
                 <div class="box-highlight">
    <p>Model <i>Hugging Face</i>memiliki kegunaan yaitu: </p>
        <ol>Terjemahkan antar bahasa. Tersedia lebih dari 1300 model yang menerjemahkan dari bahasa X ke bahasa Y.</ol>
        <ol>Klasifikasikan teks ke dalam kategori yang Anda pilih. Secara opsional, teks dapat diberi beberapa label.</ol>
        <ol>Menghasilkan ringkasan teks. Secara opsional dapat mengontrol panjang, pengulangan, dan banyak lagi.</ol>
        <ol>Adakan percakapan. Perhatikan bahwa model ini jauh lebih kecil dan kurang mampu dibandingkan model terbesar GPT-3, Jurassic 1, dan Cohere.</ol>
        <ol>Kueri spreadsheet. Ajukan pertanyaan tentang tabel data.</ol>
        <ol>Jawab pertanyaan berdasarkan konteksnya. Perhatikan bahwa model serupa dapat dijalankan di <i>browser</i> tanpa mengakses <i>Hugging Face</i>.</ol>
        <ol>Deteksi seberapa positif atau negatif suatu teks.</ol>
        <ol>Temukan entitas bernama di beberapa teks.</ol>
        <ol>Isi bagian yang kosong. Akan memprediksi teks yang hilang.</ol>
            </div>
    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 101,
            'isi' => '
               <a href="https://en.wikipedia.org/wiki/Codenames_(board_game)" target="_blank">Codenames</a> adalah sebuah permainan papan yang telah memenangkan banyak penghargaan.
Setiap tim memiliki seorang master mata-mata yang memberikan petunjuk berupa satu kata kepada rekan satu timnya.
Para rekan satu tim melihat 25 kata (awalnya) dan perlu menebak kata-kata mana yang dimaksud oleh master mata-mata.
Dengan menggunakan <span class="block-name">kata-kata terdekat dengan</span> reporter, seseorang dapat menemukan kata yang "dekat" dengan kata-kata tim mereka dan "jauh" dari kata-kata tim lawan atau kata kode dari pembunuh.
</p>
<p class="instructions">
Berikut ini adalah
<a href="../snap/snap.html?project=codenames" target="_blank">program yang sebagian mengimplementasikan master mata-mata</a>.
Diberikan daftar kata, program ini menemukan petunjuk terbaik untuk dua dari kata-kata tersebut.
Mulai dari program ini, Anda dapat membuat program untuk bermain <i>Codenames</i>.
Cobalah untuk meningkatkan program ini agar bisa mencari petunjuk untuk lebih dari dua kata sekaligus.
Tingkatkan juga agar memastikan bahwa tidak ada petunjuk yang mungkin menyarankan kata-kata dari tim lawan atau kata kode dari pembunuh.
</p>
    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 102,
            'isi' => '
                     <p>Penyematan kata dan kalimat dapat digunakan sebagai komponen dalam program AI yang melakukan analisis sentimen, deteksi entitas, rekomendasi, merangkum teks, terjemahan, dan menjawab pertanyaan. Hal ini biasanya dilakukan dengan mengganti kata atau frasa dalam teks dengan penyematannya, lalu melatih sistem pembelajaran mesin tentang perkiraan arti kata tersebut. Hal ini membuat sistem bekerja lebih baik dengan sinonim dan parafrase.</p>
     <p>Penyematan kata dipelajari dengan memeriksa teks dengan miliaran kata. Teks-teks ini mungkin menangkap bias masyarakat. Misalnya saja, contoh berikut tampaknya menangkap bias bahwa tukang daging adalah laki-laki dan pembuat roti adalah perempuan. Namun biasanya sangat lemah sehingga jika kesamaan kosinus digunakan sebagai pengganti jarak Euclidean, maka "koki" yang tidak bias akan ditemukan. Beberapa database penyematan kata memiliki bias bahwa dokter adalah laki-laki dan perawat adalah perempuan. Mereka akan menjawab pertanyaan "laki-laki ke dokter seperti perempuan ke X" dengan "perawat". Apakah ini sebuah bias? Atau mungkin karena hanya perempuan yang bisa menyusui bayi? Jalankan beberapa eksperimen di bawah untuk mengeksplorasi pertanyaan-pertanyaan semacam ini.</p>
            <figure class = "snap-iframe"
        id = "word analogy bias"
        container_style = "width: 700px; height: 450px" 
        caption = "Bias in word analogy solutions. Run it and then swap man and woman. See if you can find more biases.">
</figure>
            <p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=word%20analogy%20bias&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>

     <p>Bias dalam solusi analogi kata. Jalankan lalu tukar pria dan wanita. Lihat apakah Anda dapat menemukan lebih banyak bias.</p>
     <p>Sebuah makalah berjudul Semantik yang diturunkan secara otomatis dari korpora bahasa yang mengandung bias mirip manusia mengusulkan cara untuk mengukur bias kata. Idenya adalah menggunakan jarak rata-rata yang dimiliki dua kata terhadap dua kumpulan kata "atribut". Untuk mengeksplorasi bias gender, misalnya, daftar kata atribut dapat berupa “laki-laki, laki-laki, laki-laki” dan “perempuan, perempuan, perempuan”. Perbedaan jarak rata-rata memberikan skor yang dapat digunakan untuk membandingkan kata. Dalam penerapan penilaian reporter ini terlihat bahwa “matematika” memiliki skor “kejantanan” yang lebih tinggi daripada “seni”. Dan “seni” memiliki skor “kesenangan” yang lebih tinggi dibandingkan “matematika”.</p>

    
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 103,
            'isi' => '

     <p>Meskipun kita tidak benar-benar tahu apa arti angka-angka tersebut, angka-angka tersebut pasti mengkodekan banyak hal tentang kata-kata seperti jenis kelamin, kategori tata bahasa, hubungan keluarga, dan ratusan hal lainnya. Namun jumlahnya tidak sempurna.</p>
      <p>Lihat apakah Anda dapat membuat beberapa contoh yang hasilnya tidak bagus. Salah satu masalah umum dalam cara menghasilkan angka adalah bahwa angka tersebut menggabungkan fitur-fitur dari arti yang berbeda dari kata yang sama. Hanya ada satu entri, misalnya, untuk "bank" yang menggabungkan cara penggunaan kata tersebut dalam kalimat tentang lembaga keuangan dan kalimat tentang tepi sungai.</p>
      <p>Hal ini dapat menyebabkan kata-kata menjadi lebih dekat dari yang seharusnya. Misalnya, "tikus" dan "layar" menjadi lebih berdekatan karena "tikus" berada dekat dengan "mouse" dan "mouse" (perangkat masukan komputer) berada dekat dengan "layar" (komputer). Ini adalah masalah yang sedang ditangani para peneliti. Masalah lainnya adalah terkadang frasa pendek berfungsi seperti kata-kata. "Es krim", misalnya, tidak memiliki kata yang disematkan, sedangkan "serbet" dan "sorbet" memilikinya</p>  


    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 104,
            'isi' => '
               <p>Berikut adalah program yang menanyakan dua bahasa kepada pengguna, memperoleh vektor fitur dari kata acak dari bahasa pertama, dan kemudian menampilkan beberapa kata yang paling dekat dengan vektor fitur tersebut. Ini menempatkan kata-kata dalam perkiraan dua dimensi t-SNE di mana kata-kata 300 dimensi sebenarnya berada</p>


    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 105,
            'isi' => '
     <p>Penyematan kata untuk setiap bahasa dihasilkan secara independen berdasarkan teks dari Wikipedia dan web. Lokasi fitur dalam ruang 300 dimensi untuk kata seperti "anjing" tidak ada hubungannya dengan lokasi fitur terjemahan kata "anjing". Para peneliti memperhatikan bahwa di sebagian besar (semua?) bahasa, beberapa kata saling berdekatan. Misalnya," "anjing"," "anjing", "anak anjing", dan "anjing" itu dekat. Kata-kata seperti "serigala", "sapi", dan "tikus" memang mirip tetapi tidak sedekat kata-kata itu</p>
     <p>Dan semua kata tersebut jauh dari kata-kata abstrak seperti "kebenaran" dan "logika". Jadi mereka menemukan bahwa ada kemungkinan untuk menemukan rotasi yang akan menyebabkan banyak kata yang disematkan dalam satu bahasa menjadi dekat dengan kata-kata yang terkait dalam bahasa lain.</p>
     <p>Cara yang dilakukan pada awalnya dan di Snap ini! blok adalah dengan memberikan program daftar kata antara bahasa Inggris dan bahasa lainnya. 500 kata sudah cukup untuk menemukan rotasi bagus yang mendekatkan sebagian besar 19.500 kata lainnya ke tempat terjemahannya.</p>
     <p>Meskipun sangat mengesankan bahwa terjemahan berhasil mengingat daftar kata yang hanya mencakup 2,5% kosakata, para peneliti di <i>Facebook</i> menjelaskan teknik yang tidak menggunakan daftar kata atau teks terjemahan. Hanya diperlukan rotasi karena semua kata yang disematkan berpusat di sekitar nol sehingga tidak perlu diterjemahkan (dalam arti matematis, yaitu dipindahkan) juga.</p>
     <p>amun perhatikan bahwa terjemahannya terjadi dalam 299 dimensi!</p>
     <img src="/materials/26.jpg" class="img-materials" alt="" style="width: 40%;">
     <p>Dua cara menyelaraskan penyematan kata dalam bahasa berbeda
        Pada gambar (A) dan (B) menunjukkan X diputar untuk mencocokkan Y untuk membuat sejumlah kecil kata di X sejajar dengan terjemahannya di Y. Hasilnya, banyak kata lain yang kira-kira sejajar. Teknik lain dapat diterapkan untuk meningkatkan keselarasan.</p>


    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 106,
            'isi' => '
      <p>Dengan menggunakan teknik serupa dengan cara menghasilkan vektor untuk kata-kata, kita juga dapat menghasilkan vektor untuk gambar. Fitur get kostum dari ... blok akan meneruskan vektor 1280 angka ke blok yang disediakan. Ini menggunakan <i>Mobile Net</i> untuk menghitung angka dari "atas" jaringan saraf.</p>
            <figure class = "snap-iframe"
        id = "image embedding exercise"
        container_style = "width: 675px; height: 525px" 
    >
</figure>
<p class="mt-2 text-center">Jika gagal memuat, <a href="https://ecraft2learn.github.io/ai/snap/snap.html?project=image%20embedding%20exercise&editMode" class="font-bold text-primary" target="_blank">klik disini!</a></p>
     <p>Sebuah blok untuk mengubah gambar menjadi daftar 1280 angka. COBALAH!</p>
     <p>Seseorang dapat menggunakan penyematan gambar untuk menentukan gambar mana yang dekat dengan gambar lainnya. Kedekatan memperhitungkan banyak faktor termasuk tekstur, warna, bagian, dan semantik. Penyematan gambar dapat digunakan untuk menyelesaikan masalah analogi gambar yang serupa dengan cara menyelesaikan masalah analogi kata</p>
     <p>Pada bab pembelajaran mesin terdapat deskripsi kereta dengan gambar ember ... blok yang digunakan untuk pelatihan. Ia bekerja dengan mengumpulkan vektor fitur dari semua gambar pelatihan dan kemudian menemukan tetangga terdekat dengan gambar uji untuk menentukan label apa yang akan diberikan pada gambar tersebut.</p>
     
    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 107,
            'isi' => '
      <p>Berikut adalah beberapa ide proyek:</p>
     <ol>1. Temukan rangkaian kata yang mirip dengan mencari kata yang paling dekat dengan kata awalnya. Kemudian berulang kali temukan kata yang terdekat dengan kata tersebut sambil memastikan untuk tidak pernah mengulangi kata yang sama. Gunakan ini untuk berulang kali mengubah kata-kata acak satu per satu dalam puisi atau teks terkenal (misalnya, "mawar berwarna merah dan violet berwarna biru").</ol>
     <ol>2. Buat permainan kata menggunakan penyematan kata. Misalnya saja Semantris, versi semantik dari Tetris. Semantris versi bilingual mungkin merupakan ide yang bagus </ol>
     <ol>3. Buat program yang mencari analogi kata baru. Petunjuk: Jika A ke B dan C ke D, maka A-B "mendekati" C-D.</ol>
     <ol>4. Jelajahi mengapa terkadang analogi kata benar dan terkadang salah. Apakah jawaban terdekat kedua, ketiga, atau kesepuluh lebih masuk akal? Petunjuk: gunakan kata-kata yang paling dekat dengan reporter untuk mendalami hal ini. Apakah analogi kata lebih baik jika A dekat dengan B dalam "A ke B seperti C ke D"?</ol>
     <ol>5. Para peneliti menemukan bahwa jika melihat jarak rata-rata antara kata menyenangkan dan kata "bunga", jarak tersebut jauh lebih kecil dibandingkan jarak "bunga" ke kata tidak menyenangkan. Hal sebaliknya terjadi jika menelusuri jarak kata menyenangkan dan tidak menyenangkan dengan kata "serangga". Berdasarkan pengamatan ini, orang-orang membuat perbandingan lain untuk melihat bagaimana, misalnya, kata-kata tentang laki-laki lebih mirip dengan kata-kata tentang sains, sedangkan kata-kata tentang perempuan lebih mirip dengan kata-kata seni. Lihat apakah Anda dapat menemukan bias lain yang muncul dari cara orang menulis tentang sesuatu. Jika Anda mengetahui bahasa lain (dan bahasa tersebut merupakan salah satu dari 15 bahasa yang didukung) lihat apakah bahasa tersebut berlaku di berbagai bahasa.</ol>
     <ol>6. Jelajahi hubungan antar kata dalam kelompok seperti kata berwarna atau kata emosi. Apakah "merah", "hijau", dan "biru" berdekatan satu sama lain atau merupakan kata-kata warna yang berdekatan bila warnanya tampak serupa. Jika Anda mengetahui bahasa lain, lihat apakah bahasa yang berbeda mengatur kata-kata berwarna secara berbeda. Coba ini dengan kategori lain seperti emosi, arah, angka, dll.</ol>
     <ol>7. Jelajahi hubungan antara versi tata bahasa yang berbeda dari kata dasar yang sama. Misalnya, hubungan "tinggi", "lebih tinggi", "tertinggi", "pendek", "lebih pendek", "terpendek". Atau "lari", "lari", "berlari" (dan "berair" dan "lebih berlari"). Dapatkah Anda menemukan beberapa pola umum? Apakah mereka menggeneralisasi ke bahasa lain?</ol>
     <ol>8. Jelajahi penyematan kata untuk kata angka. Misalnya, "dua" berarti "empat" dan "sepuluh" berarti "dua puluh". Dapatkah Anda menemukan contoh lain?</ol>
     <ol>9. Tebak Kata Saya sangat sulit karena jawabannya bisa satu dari 20.000 kata. Buatlah versi permainan yang lebih mudah.</ol>
     <ol>10. Menerapkan Spymaster untuk game Codenames.</ol>
     <ol>11. Coba gunakan embeddings untuk mengeksplorasi kesamaan kalimat. Gunakan blok fitur kalimat... untuk mendapatkan fitur kalimat. Buat proyek yang memutuskan apakah dua kalimat merupakan parafrase.</ol>
     <ol>12. Buat proyek penjawab pertanyaan yang memeriksa apakah pertanyaan yang diajukan cukup mirip dengan pertanyaan yang diketahui sehingga dapat dibalas dengan jawaban "kalengan". Anda mungkin ingin memulai dengan meningkatkan contoh proyek yang menjawab pertanyaan tentang Snap! blok AI</ol>
     <ol>13. Menggunakan blok jawaban pertanyaan ini ... menggunakan bagian ini ... bersama dengan blok Tanya <i>Wikipedia</i> untuk membuat program penjawab pertanyaan umum. Pertimbangkan untuk menambahkan masukan dan keluaran ucapan.</ol>   
     <ol>14. Ada banyak cara untuk menambahkan GPT-3 ke proyek Anda dengan menggunakan blok lengkap menggunakan GPT-3 .... OpenAI mencantumkan lusinan tugas yang dapat Anda berikan.</ol>
     <ol>15. Proyek percakapan GPT-3, Jurassic 1, dan Cohere mendukung beberapa persona. Lihat apakah Anda dapat menciptakan lebih banyak lagi. Misalnya, perhatikan Bima Sakti</ol>
     <ol>16. Alternatifnya, daripada menyempurnakan proyek percakapan, buatlah proyek percakapan Anda sendiri dari awal dengan mengikuti tutorial ini.</ol>
     <ol>17. Contoh proyek GPT-3 untuk menghasilkan cerita bergambar dapat dieksplorasi dengan mengubah perintah, suhu penyelesaian, dan pengaturan lainnya.</ol>
     <ol>18. Blok Minta DALLE-2 untuk membuat ... kostum ... dapat digunakan dalam proyek yang menggambar sesuatu dan membuat kostum baru menggunakan perintah tekstual dan jalur pena untuk membuat kostum gambar.</ol>
     <ol>19. Proyek pembuatan debat virtual dapat ditingkatkan dengan banyak cara termasuk menciptakan lebih banyak sanggahan dan ringkasan.</ol>
     <ol>20. Jadilah kreatif! Penyematan kata dan model bahasa merupakan hal baru dan masih banyak yang perlu ditemukan.</ol>


    ',

            'xp' => 10
        ]);


        Material::create([
            'content_id' => 108,
            'isi' => '
          <p>Blok penyematan kata baru dapat ditambahkan. Saat ini kata blok embeddings tidak termasuk semua kata benda yang tepat. Jika kita menambahkannya, kita dapat memecahkan analogi seperti Paris dengan Perancis dan Berlin dengan X. Menjelajahi bagaimana kata-kata berubah seiring waktu dapat menghasilkan proyek-proyek besar. Penyematan kata yang dihasilkan dari publikasi dalam periode waktu berbeda dapat digunakan untuk melihat bagaimana kata-kata seperti "mengerikan" dan "siaran" telah berubah selama dua abad terakhir. Blok baru dapat ditambahkan berdasarkan penelitian tentang menghasilkan penyematan "makna kata" dan bukan penyematan kata. Misalnya, satu arti "bebek" dekat dengan "ayam" sementara arti lain dekat dengan "melompat".</p>
     <p>Masih banyak lagi yang dapat dilakukan program AI dengan bahasa termasuk menentukan struktur tata bahasa kalimat (ini disebut "parsing"), mencari tahu sentimen dalam beberapa teks, dan meringkas teks. Kami berencana untuk menambahkan lebih banyak.</p>


    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 109,
            'isi' => '
               <p>Artikel penyematan kata Wikipedia pendek dan ditulis untuk pembaca tingkat lanjut. Tim Facebook menulis makalah yang merinci bagaimana mereka menghasilkan penyematan kata yang kami gunakan di sini: E. Grave, P. Bojanowski, P. Gupta, A. Joulin, T. Mikolov, Mempelajari Vektor Kata untuk 157 Bahasa.</p>
     <p>Halaman web Memahami vektor kata memiliki pengenalan subjek yang sangat baik dan berisi contoh-contoh yang berguna tetapi memerlukan pemahaman tentang Python. Blog Google tentang bias dalam penyematan kata ini sangat bagus dan jelas. Kursus Mengarahkan Google yang tepat untuk AI membahas bias dan masalah sosial lainnya termasuk interpretasi, pekerjaan, dan berbuat baik. Adil Lebih Baik daripada Sensasional: Laki-laki ke Dokter seperti Wanita ke Dokter membahas bias dalam penyematan kata secara mendalam.</p>
     <p>Cara Menggunakan t-SNE Secara Efektif adalah penjelasan interaktif yang jelas tentang cara kerja t-SNE. Memanfaatkan Kesamaan antar Bahasa untuk Terjemahan Mesin memelopori gagasan menyesuaikan penyematan kata untuk mendukung terjemahan. Terjemahan Kata Tanpa Data Paralel mengeksplorasi bagaimana penyematan kata dapat digunakan untuk terjemahan tanpa menggunakan daftar kata atau teks terjemahan.</p>
     <P><i>proyektor.tensorflow.org</i> adalah situs web bagus untuk menjelajahi berbagai cara memvisualisasikan ruang berdimensi tinggi secara interaktif. Berikut adalah video ceramah indah Laurens van der Maaten yang menemukan ide t-SNE.</P>   
   

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 110,
            'isi' => '
               <p>Anda dapat mengimpor blok yang disajikan di sini sebagai proyek atau mengunduhnya sebagai perpustakaan untuk diimpor ke proyek Anda.</p>

    ',

            'xp' => 10
        ]);
        Material::create([
            'content_id' => 111,
            'isi' => '
                 <p>Lanjutkan ke bab berikutnya tentang jaringan saraf</p>
                 <img src="https://miro.medium.com/v2/resize:fit:2000/1*3fA77_mLNiJTSgZFhYnU0Q@2x.png" class="img-materials" alt="" style="width: 40%;">

    ',

            'xp' => 10
        ]);






        //-----------------------Quiz---------------------//

        Quiz::create([ //1
            'content_id' => 6,
            'desc' => '<p>Cek pengetahuan ini merupakan tes yang memiliki 3 pertanyaan terkait materi yang sudah di pelajari oleh anda. Jawablah pertanyaan dengan tepat untuk mendapatkan point!</p><br>
            <p class="font-semibold mt-4">Aturan:</p>
            <ol class="list-inside list-decimal">
                <li>Anda akan diberikan 3 point untuk setiap pertanyaan dan tidak batas waktu pengisian.</li>
                <li>Setiap soal diberikan kesempatan 3 kali mengisi hingga benar dengan setiap pengisian akan mengurangi 1 point.</li> 
            </ol>',
            'xp' => 30
        ]);

        Quiz::create([ //2
            'content_id' => 11,
            'desc' => '<p>Cek pengetahuan ini merupakan tes yang memiliki 3 pertanyaan terkait materi yang sudah di pelajari oleh anda. Jawablah pertanyaan dengan tepat untuk mendapatkan point!</p><br>
            <p class="font-semibold mt-4">Aturan:</p>
            <ol class="list-inside list-decimal">
                <li>Anda akan diberikan 3 point untuk setiap pertanyaan dan tidak batas waktu pengisian.</li>
                <li>Setiap soal diberikan kesempatan 3 kali mengisi hingga benar dengan setiap pengisian akan mengurangi 1 point.</li> 
            </ol>',
            'xp' => 30
        ]);

        Quiz::create([ //3
            'content_id' => 37,
            'desc' => '<p>Tes akhir ini memiliki 10 pertanyaan terkait materi yang sudah di pelajari oleh anda. Jawablah pertanyaan dengan tepat untuk mendapatkan point!</p><br>
            <p class="font-semibold mt-4">Aturan:</p>
            <ol class="list-inside list-decimal">
                <li>Anda akan diberikan 3 point untuk setiap pertanyaan dan tidak batas waktu pengisian.</li>
                <li>Setiap soal diberikan kesempatan 3 kali mengisi hingga benar dengan setiap pengisian akan mengurangi 1 point.</li> 
            </ol>',
            'xp' => 30
        ]);

        Quiz::create([ //4
            'content_id' => 56,
            'desc' => '<p>Tes akhir ini memiliki 5 pertanyaan terkait materi yang sudah di pelajari oleh anda. Jawablah pertanyaan dengan tepat untuk mendapatkan point!</p><br>
            <p class="font-semibold mt-4">Aturan:</p>
            <ol class="list-inside list-decimal">
                <li>Anda akan diberikan 3 point untuk setiap pertanyaan dan tidak batas waktu pengisian.</li>
                <li>Setiap soal diberikan kesempatan 3 kali mengisi hingga benar dengan setiap pengisian akan mengurangi 1 point.</li> 
            </ol>',
            'xp' => 30
        ]);

        //-----------------------Questions---------------------//
        Question::create([ //1
            'quiz_id' => 1,
            'pertanyaan' => 'Di bawah ini mana penyataan yang kurang tepat?',
            'prev_quest' => 0,
            'next_quest' => 2
        ]);

        Question::create([ //2
            'quiz_id' => 1,
            'pertanyaan' => 'Dibawah ini manakah perintah untuk menjalankan speech synthesis di Snap?',
            'prev_quest' => 1,
            'next_quest' => 3
        ]);

        Question::create([ //3
            'quiz_id' => 1,
            'pertanyaan' => 'Hal mendasar apa saja yang dapat diucapkan oleh blok Speak?',
            'prev_quest' => 2,
            'next_quest' => 0
        ]);

        Question::create([ //4
            'quiz_id' => 2,
            'pertanyaan' => 'Dibawah ini yang bukan merupakan parameter dalam mengontrol speech synthesis adalah?',
            'prev_quest' => 0,
            'next_quest' => 5
        ]);

        Question::create([ //5
            'quiz_id' => 2,
            'pertanyaan' => 'Perintah yang dapat digunakan untuk mengeksekusi perintah setelah perintah pertama adalah...',
            'prev_quest' => 4,
            'next_quest' => 6
        ]);

        Question::create([ //6
            'quiz_id' => 2,
            'pertanyaan' => 'Manakah dibawah ini parameter yang paling tepat untuk menambahkan aksen dalam pengucapan?',
            'prev_quest' => 5,
            'next_quest' => 0
        ]);

        // QUIZ CHAPTER 4 //

        Question::create([ //7
            'quiz_id' => 3,
            'pertanyaan' => 'Dalam bidang Artificial intelligence terdapat sub-bidang lagi yang dikenal dengan sebutan Machine Learning. Manakah dari pernyataan berikut ini yang merupakan penjelasan dari Machine Learning?',
            'prev_quest' => 0,
            'next_quest' => 8
        ]);

        Question::create([ //8
            'quiz_id' => 3,
            'pertanyaan' => 'Kebutuhan utama yang dapat memproses suatu program Machine Learning agar sesuai dengan rancangan adalah?',
            'prev_quest' => 7,
            'next_quest' => 9
        ]);

        Question::create([ //9
            'quiz_id' => 3,
            'pertanyaan' => 'Machine Learning menggunakan "confidence scores" dalam bagian dataset yang kita tes untuk melihat keakuratan atau performanya. Manakah di bawah ini yang termasuk definisi dari Confidence scores?',
            'prev_quest' => 8,
            'next_quest' => 10
        ]);

        Question::create([ //10
            'quiz_id' => 3,
            'pertanyaan' => 'Di bawah ini adalah cara untuk load data training yang telah disimpan, Kecuali?',
            'prev_quest' => 9,
            'next_quest' => 11
        ]);

        Question::create([ //11
            'quiz_id' => 3,
            'pertanyaan' => 'Dalam melatih label input gambar, Machine Learning memerlukan suatu blok pemrograman yaitu blok train with image buckets. Blok tersebut memiliki fungsi tersendiri, yaitu untuk?',
            'prev_quest' => 10,
            'next_quest' => 12
        ]);

        Question::create([ //12
            'quiz_id' => 3,
            'pertanyaan' => 'Pada platform blok programing terdapat istilah yang disebut dengan Sprite. Di bawah ini manakah definisi yang tepat tentang Sprite?',
            'prev_quest' => 11,
            'next_quest' => 13
        ]);

        Question::create([ //13
            'quiz_id' => 3,
            'pertanyaan' => 'Aplikasi dari model machine learning yang melakukan training data suara adalah?...',
            'prev_quest' => 12,
            'next_quest' => 14
        ]);

        Question::create([ //14
            'quiz_id' => 3,
            'pertanyaan' => 'Berikut ini yang merupakan cara kerja deteksi pose adalah?..',
            'prev_quest' => 13,
            'next_quest' => 15
        ]);

        Question::create([ //15
            'quiz_id' => 3,
            'pertanyaan' => 'Pada pelatihan/training pose Machine Learning, terdapat software browser yang disebut dengan Posenet. Berikut ini adalah pernyataan yang benar untuk Posenet, kecuali?',
            'prev_quest' => 14,
            'next_quest' => 16
        ]);

        Question::create([ //16
            'quiz_id' => 3,
            'pertanyaan' => 'Terdapat beberapa macam model pada deep learning, salah satunya yaitu Bodypix. Manakah di bawah ini yang termasuk definisi dari Bodypix?',
            'prev_quest' => 15,
            'next_quest' => 0
        ]);


        Question::create([ //17
            'quiz_id' => 4,
            'pertanyaan' => 'Dalam block programming snap! pada fungsi speech recognation, perintah yang digunakan untuk mengganti bahasa adalah ….',
            'prev_quest' => 0,
            'next_quest' => 18
        ]);
        Question::create([ //18
            'quiz_id' => 4,
            'pertanyaan' => 'Jika kita akan membuat sekumpulan perintah atau instruksi yang dibuat dalam sebuah block maka fitur yang dapat digunakan adalah ….',
            'prev_quest' => 17,
            'next_quest' => 19
        ]);
        Question::create([ //19
            'quiz_id' => 4,
            'pertanyaan' => 'Kode block yang dapat digunakan untuk menerima input berupa speech adalah…',
            'prev_quest' => 18,
            'next_quest' => 20
        ]);
        Question::create([ //20
            'quiz_id' => 4,
            'pertanyaan' => 'Kode block yang digunakan agar program berbicara sesuai dengan text yang dimasukan…',
            'prev_quest' => 19,
            'next_quest' => 21
        ]);

        Question::create([ //21
            'quiz_id' => 4,
            'pertanyaan' => 'Yang bukan contoh aplikasi sehari-hari yang menggunakan speech synthesis…',
            'prev_quest' => 20,
            'next_quest' => 0
        ]);
        // END OF QUIZ CHAPTER 4 //

        //-----------------------Answer---------------------//
        Answer::create([
            'question_id' => 1,
            'jawaban' => 'a. Speech synthesis dapat mengucapkan kalimat utuh',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 1,
            'jawaban' => 'b. Speech synthesis dapat membedakan mana kalimat pertanyaan dan deklaratif',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 1,
            'jawaban' => 'c. Speech synthesis hanya dapat mengucapkan kata-kata',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 1,
            'jawaban' => 'd. Speech synthesis memiliki kemampuan berbicara berbagai bahasa',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 2,
            'jawaban' => 'a. Speak',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 2,
            'jawaban' => 'b. Set default language to',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 2,
            'jawaban' => 'c. Open this in a new tab',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 2,
            'jawaban' => 'd. Play',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 3,
            'jawaban' => 'a. Kalimat Utuh',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 3,
            'jawaban' => 'b. Tanggal',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 3,
            'jawaban' => 'c. Mata uang ',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 3,
            'jawaban' => 'd. Semua Benar',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 4,
            'jawaban' => 'a. With pitch',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 4,
            'jawaban' => 'b. With rate',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 4,
            'jawaban' => 'c. With voice',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 4,
            'jawaban' => 'd. With sound',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 5,
            'jawaban' => 'a. Speak',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 5,
            'jawaban' => 'b. With',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 5,
            'jawaban' => 'c. Then',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 5,
            'jawaban' => 'd. After',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 6,
            'jawaban' => 'a. voice that matches [english] [uk]',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 6,
            'jawaban' => 'b. voice that matches [english]',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 6,
            'jawaban' => 'c. voice that matches [male]',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 6,
            'jawaban' => 'd. voice that matches [english] [female]',
            'status' => 0
        ]);

        // ANSWER CHAPTER 4 //

        Answer::create([
            'question_id' => 7,
            'jawaban' => 'a. sebuah data yang digunakan untuk melihat keakuratan suatu Performa',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 7,
            'jawaban' => 'b. sebuah mesin yang dikembangkan untuk menjalankan suatu sistem dengan sendirinya melalui pengenalan pola',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 7,
            'jawaban' => 'c. sebuah sistem yang dikembangkan untuk memecahkan masalah dengan cara menurut manusia',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 7,
            'jawaban' => 'd. sebuah sistem pembelajaran structural yang mendalami untuk memecahkan masalah',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 8,
            'jawaban' => 'a. Data training & data testing',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 8,
            'jawaban' => 'b. Data mining & data testing',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 8,
            'jawaban' => 'c. Data collecting & data testing',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 8,
            'jawaban' => 'd. Data sorting & data testing',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 9,
            'jawaban' => 'a. Angka antara 0 dan 1 yang menunjukkan kemungkinan keluaran model ML',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 9,
            'jawaban' => 'b. Angka antara 0 dan 1 yang menunjukkan kemungkinan masukan model ML',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 9,
            'jawaban' => 'c. Angka antara 0 dan 1 yang menunjukkan isi dari model ML ',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 9,
            'jawaban' => 'd. Angka antara 0 dan 1 yang menunjukkan sisa dari model ML',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 10,
            'jawaban' => 'a. Load file dari sistem penyimpanan lokal',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 10,
            'jawaban' => 'b. Load file dari web ',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 10,
            'jawaban' => 'c. Load file dari aplikasi machine learning',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 10,
            'jawaban' => 'd. Load file dengan memasukkan URL untuk mengaksesnya',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 11,
            'jawaban' => 'a. mengirimkan sprites pada tab training',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 11,
            'jawaban' => 'b. mendapatkan nilai confidence',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 11,
            'jawaban' => 'c. memberhentikan data training',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 11,
            'jawaban' => 'd. melakukan training menggunakan gambar dari kamera',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 12,
            'jawaban' => 'a. Objek yang menunjukkan kemungkinan keluaran model ML',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 12,
            'jawaban' => 'b. Objek yang dapat diprogram',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 12,
            'jawaban' => 'c. Objek yang dapat dihitung',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 12,
            'jawaban' => 'd. Objek yang dapat menunjukkan urutan dari model ML',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 13,
            'jawaban' => 'a. Google translate',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 13,
            'jawaban' => 'b. Google teachable machine',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 13,
            'jawaban' => 'c. Google AI',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 13,
            'jawaban' => 'd. Google neural nets',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 14,
            'jawaban' => 'a. memisahkan key point lalu algoritma dibuat',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 14,
            'jawaban' => 'b. menyiapkan data, lalu algoritma dibuat',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 14,
            'jawaban' => 'c. menghubungkan key point lalu memperhalus posisi',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 14,
            'jawaban' => 'd. mengidentifikasi lokasi bagian tubuh, lalu melatih modelnya',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 15,
            'jawaban' => 'a. Digunakan untuk estimasi pose manusia secara real-time',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 15,
            'jawaban' => 'b. menentukan lokasi bagian wajah dan tubuh yang berbeda',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 15,
            'jawaban' => 'c. menampilkan mirrored video',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 15,
            'jawaban' => 'd. mengklasifikasikan setiap pixel pada foto manusia',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 16,
            'jawaban' => 'a. Model segmentasi deep learning yang mengklasifikasikan setiap piksel dalam foto manusia',
            'status' => 1
        ]);

        Answer::create([
            'question_id' => 16,
            'jawaban' => 'b. Model segmentasi deep learning yang mencari foto manusia',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 16,
            'jawaban' => 'c. Model segmentasi deep learning yang dapat menampilkan foto manusia',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 16,
            'jawaban' => 'd. Model segmentasi deep learning yang dapat mengunduh foto manusia',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 17,
            'jawaban' => 'a. Set default voice to',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 17,
            'jawaban' => 'b. Set default sound to ',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 17,
            'jawaban' => 'c. Set default language to ',
            'status' => 1
        ]);
        Answer::create([
            'question_id' => 17,
            'jawaban' => 'd. Set default speech to ',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 18,
            'jawaban' => 'a. Make variable',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 18,
            'jawaban' => 'b. Make block',
            'status' => 1
        ]);
        Answer::create([
            'question_id' => 18,
            'jawaban' => 'c. Make sound',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 18,
            'jawaban' => 'd. Make function',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 19,
            'jawaban' => 'a. Pada block control , When I receive (heard something)',
            'status' => 1
        ]);
        Answer::create([
            'question_id' => 19,
            'jawaban' => 'b. Pada block sensing, set object to',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 19,
            'jawaban' => 'c. Pada block sensing, object myself',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 19,
            'jawaban' => 'd. Pada block control, when space key pressed',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 20,
            'jawaban' => 'a. Speech',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 20,
            'jawaban' => 'b. Speak',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 20,
            'jawaban' => 'c. Say',
            'status' => 1
        ]);
        Answer::create([
            'question_id' => 20,
            'jawaban' => 'd. Voice',
            'status' => 0
        ]);

        Answer::create([
            'question_id' => 21,
            'jawaban' => 'a. Siri',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 21,
            'jawaban' => 'b. Google sound',
            'status' => 1
        ]);
        Answer::create([
            'question_id' => 21,
            'jawaban' => 'c. Amazon Alexa',
            'status' => 0
        ]);
        Answer::create([
            'question_id' => 21,
            'jawaban' => 'd. Google Voice Translate',
            'status' => 0
        ]);

        // END OF ANSWER CHAPTER 4 //

        //-----------------------Evaluation---------------------//
        Evaluation::create([
            'content_id' => 17,
            'xp' => 50,
            'studi_kasus' => '<p class="font-semibold ">Buatlah sebuah program dalam mengucapkan sebuah pantun dibawah ini menggunakan blok speech synthesis!</p><br>
            <p>Hmmm aku mau berpantun nih, dengerin ya!</p>
            <p>Rusa kecil diam terkurung</p>
            <p>Kurang makan kurang minum</p>
            <p>Cari ilmu jangan murung</p>
            <p>Cerialah selalu banyak tersenyum</p>
            <p>*suara tepuk tangan*</p><br>',
            'step' => '<ol class="list-decimal ml-4 leading-relaxed">
            <li>Gunakan template snap berikut <a class="text-info font-bold"
                href="https://ecraft2learn.github.io/ai/snap/snap.html?project=speaking&editMode"
                target="_blank">(Klik)</a></li>
            <li>Gunakan atau buang blok yang ada atau juga menambahkan untuk menyelesaikan studi kasus</li>
            <li>Setelah dirasa selesai, klik icon file putih di pojok kiri atas</li>
            <li>Pilih save as, kemudian pilih computer, dan merubah nama file lalu tekan tombol save</li>
            <li>File pekerjaan tada akan berformat .XML</li>
            <li>Upload file tersebut di form upload jawaban dan tunggu hingga dinilai oleh ahli</li>
          </ol>'
        ]);

        //-----------------------Rubrik---------------------//

        Rubrik::create([
            'evaluation_id' => 1,
            'score' => 10.0,
            'desc' => '<p>Program yang dibangung memuat: </p><p> (1) Blok Sederhana </p><p> (2) Blok yang berbicara selain bentuk kata-kata </p><p> (3) Efek suara </p><p> (4) Paramater kontrol blok speech synthesis</p><p> (5) Parameter kontrol untuk merubah jenis suara </p><p> (6) Blok untuk berbicara bukan sebuah kata</p>',
            'point' => 100
        ]);

        Rubrik::create([
            'evaluation_id' => 1,
            'score' => 8.0,
            'desc' => '<p>Program yang dibangung memuat: </p><p> (1) Blok Sederhana </p><p> (2) Blok yang berbicara selain bentuk kata-kata </p><p> (3) Efek suara </p><p> (4) Paramater kontrol blok speech synthesis</p><p> (5) Parameter kontrol untuk merubah jenis suara </p>',
            'point' => 80
        ]);

        Rubrik::create([
            'evaluation_id' => 1,
            'score' => 6.0,
            'desc' => '<p>Program yang dibangung memuat: </p><p> (1) Blok Sederhana </p><p> (2) Blok yang berbicara selain bentuk kata-kata </p><p> (3) Efek suara </p><p> (4) Paramater kontrol blok speech synthesis</p>',
            'point' => 60
        ]);

        Rubrik::create([
            'evaluation_id' => 1,
            'score' => 4.0,
            'desc' => '<p>Program yang dibangun hanya memuat blok speech synthesis sederhana dan blok yang berbicara selain bentuk kata-kata</p>',
            'point' => 40
        ]);

        Rubrik::create([
            'evaluation_id' => 1,
            'score' => 2.0,
            'desc' => '<p>Program yang dibangun hanya memuat blok speech synthesis sederhana (blok speak)</p>',
            'point' => 20
        ]);

        //-----------------------Challenge---------------------//

        Challenge::create([
            'judul' => 'Program Snap! AI untuk mengubah kalimat menjadi suara (Speech Synthesis)',
            'deskripsi' => 'Membuat program snap! dengan speech synthesis untuk dua suara yang berbeda sedang mengobrol seperti...',
            'isi' => '<p class="text-xl font-semibold mb-4">Program Snap! AI untuk mengubah kalimat menjadi suara (Speech Synthesis)</p>
            <p>Buatlah program snap! dengan speech synthesis untuk dua suara yang berbeda sedang mengobrol seperti berikut:
            <br><br>Suara A : “Hallo, salam kenal nama saya Mars”
            <br>Suara B : “Hallo, salam kenal juga, saya Zeys”
            <br>Suara A : “Bagaimana pertadingan tadi Zeys?”
            <br>Suara B : “Pertandingan tadi sangat seru!”</p>
            <p class="mt-4">Kerjakan tantangan di snap! kemudian export file as xml!</p>',
            'step' => '<ol class="list-decimal ml-4 leading-relaxed">
            <li>Gunakan template snap berikut <a class="text-info font-bold"
                href="https://ecraft2learn.github.io/ai/snap/snap.html?project=speaking&editMode"
                target="_blank">(Klik)</a></li>
            <li>Gunakan atau buang blok yang ada atau juga menambahkan untuk menyelesaikan Tantangan</li>
            <li>Setelah dirasa selesai, klik icon file putih di pojok kiri atas</li>
            <li>Pilih save as, kemudian pilih computer, dan merubah nama file lalu tekan tombol save</li>
            <li>File pekerjaan tada akan berformat .XML</li>
            <li>Upload file tersebut di form upload jawaban dan tunggu hingga dinilai oleh ahli</li>
          </ol>',
            'point' => 20,
            'xp' => 60,
        ]);

        Challenge::create([
            'judul' => 'Permainan kertas, gunting, batu yang lebih advance',
            'deskripsi' => 'Buatlah permainan gunting batu kertas dengan versi user melawan user.',
            'isi' => '<p class="text-xl font-semibold mb-4">Permainan kertas, gunting, batu yang lebih advance</p>
            <p class="mt-4">Kerjakan tantangan di snap! kemudian export file as xml!</p>',
            'step' => '<ol class="list-decimal ml-4 leading-relaxed">
            <li>Kamu dapat melihat pertanyaan tantangan yang akan kamu kerjakan di halaman
            pertama</li>
            <li> Buka <a class="text-info font-bold"
            href="https://ecraft2learn.github.io/ai/snap/snap.html?project=speaking&editMode"
            target="_blank">Snap!</a> untuk mengerjakan tantangan mu, lalu simpanlah pekerjaanmu ke
            devicemu</li>
            <li>Pilih save as, kemudian pilih computer, dan merubah nama file lalu tekan tombol save</li>
            <li>File pekerjaan tada akan berformat .XML</li>
            <li>Upload file tersebut di form upload jawaban dan tunggu hingga dinilai oleh ahli</li>
          </ol>',
            'point' => 20,
            'xp' => 60,
        ]);
    }
}