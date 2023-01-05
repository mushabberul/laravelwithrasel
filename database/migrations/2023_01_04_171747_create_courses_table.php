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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('book')->default(0);
            $table->unsignedBigInteger('year')->default(2021);
            $table->float('price')->default(0.00);
            $table->unsignedBigInteger('image');
            $table->longText('content');
            $table->longText('link');
            $table->bigInteger('submited_by')->unsigned();
            $table->unsignedSmallInteger('duration');
            $table->bigInteger('platform_id')->unsigned();
            $table->foreign('submited_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('course_topic', function (Blueprint $table) {
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
        Schema::create('course_series', function (Blueprint $table) {
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('series_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
        });
        Schema::create('course_author', function (Blueprint $table) {
            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
