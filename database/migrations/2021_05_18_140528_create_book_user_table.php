<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user', function (Blueprint $table) {
            $table->integer('book_id')->index();
            $table->foreignId('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->integer('user_id')->index();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['book_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user');
    }
}
