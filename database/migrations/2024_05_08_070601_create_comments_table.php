<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('commentId');
            $table->unsignedInteger('commentPostId');
            $table->unsignedInteger('commentUserId');
            $table->text('commentContent');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('commentPostId')->references('postId')->on('posts');
            $table->foreign('commentUserId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
