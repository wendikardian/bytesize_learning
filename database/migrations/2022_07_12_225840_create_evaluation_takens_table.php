<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_takens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_learning_id');
            $table->foreignId('evaluation_id');
            $table->string('file_path')->nullable();
            $table->double('nilai')->default(0);
            $table->integer('point')->default(0);
            $table->integer('xp')->default(0);
            $table->integer('status')->default(0);
            $table->dateTime('waktu_pengumpulan')->nullable();
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
        Schema::dropIfExists('evaluation_takens');
    }
}
