<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films')->cascadeOnDelete();
            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')->references('id')->on('genres')->cascadeOnDelete();
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
        Schema::dropIfExists('genres_films');
    }
}
