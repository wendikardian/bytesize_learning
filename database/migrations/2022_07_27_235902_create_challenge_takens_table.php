<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengeTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_takens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('challenge_id');
            $table->foreignId('user_id');
            $table->dateTime('submit_date')->nullable(true);
            $table->string('answer_file')->nullable(true);
            $table->integer('point')->default(0);
            $table->integer('xp')->default(0);
            $table->double('score')->default(0);
            $table->integer('status')->default(0);
            $table->text('comment')->nullable(true);
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
        Schema::dropIfExists('challenge_takens');
    }
}
