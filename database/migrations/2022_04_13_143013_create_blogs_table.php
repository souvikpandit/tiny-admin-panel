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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title',256);
            $table->longText('short_desc')->nullable();
            $table->string('slug',256);
            $table->string('image')->nullable();
            $table->boolean('show_image')->nullable()->default(true);
            $table->longText('body');
            $table->boolean('status')->nullable()->default(true);
            $table->bigInteger('author_id')->unsigned();
            $table->boolean('comment_status')->nullable();
            $table->longText('blog_meta')->nullable();

            $table->foreign('author_id')->references('id')->on('authors');
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
        Schema::dropIfExists('blogs');
    }
};
