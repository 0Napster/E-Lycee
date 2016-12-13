<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('title');
            $table->string('abstract');
            $table->string('content');
            $table->string('url_thumbnail');
            $table->string('date');
            $table->enum('status', ['published', 'unpublished', 'trashed']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::drop('posts');
    }
}
