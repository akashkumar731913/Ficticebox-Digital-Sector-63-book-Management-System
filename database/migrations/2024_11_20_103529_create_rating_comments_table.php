<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();  
            $table->unsignedBigInteger('book_id')->nullable();  
            $table->string('rating')->nullable();
            $table->string('comment')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('rating_comments');
    }
}
