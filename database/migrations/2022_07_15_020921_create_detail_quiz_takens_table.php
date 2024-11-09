<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailQuizTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_quiz_takens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_taken_id');
            $table->foreignId('question_id');
            $table->integer('answer_id')->nullable($value = true);
            $table->integer('current_point')->default(3);
            $table->integer('status')->default(0);
            $table->boolean('is_true')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_quiz_takens');
    }
}
