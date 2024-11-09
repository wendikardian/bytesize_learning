<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
class NewQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Content::create([ //56
            'id' => 56,
            'course_id' => 3,
            'sub_course_id' => 20,
            'judul' => 'Latihan',
            'tipe_content' => 2,
            'prev_id' => 55,
            'next_id' => 0,
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

    }
}
