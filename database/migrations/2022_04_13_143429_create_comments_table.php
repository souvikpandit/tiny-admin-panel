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
            $table->id();
            $table->bigInteger('blog_id')->unsigned()->index();
            $table->string('name',256)->nullable();
            $table->string('email',256)->nullable();
            $table->longText('comment')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->longText('comment_meta')->nullable();
            $table->boolean('is_seen')->nullable()->default(true);
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
};
