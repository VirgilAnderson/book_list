<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->comment('The title of the book in your favorites.');
            $table->string('author', 255)->nullable()->comment('The name of the author.');
            $table->string('pages', 255)->nullable()->comment('The number of pages in the book.');
            $table->string('genre', 255)->nullable()->comment('The genre of the book');
            $table->string('publisher', 255)->nullable()->comment('The publisher of the book.');
            $table->text('description')->nullable()->comment('The full text description of the book.');
            $table->unsignedBigInteger('sort_order')->comment('The order of favorite books.');
            $table->unsignedBigInteger('creator_id')->index('creator_id')->comment('The user_id of the creating owner');
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
