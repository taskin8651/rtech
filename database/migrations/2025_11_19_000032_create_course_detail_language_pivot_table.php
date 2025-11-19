<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailLanguagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_detail_language', function (Blueprint $table) {
            $table->unsignedBigInteger('course_detail_id');
            $table->foreign('course_detail_id', 'course_detail_id_fk_10763431')->references('id')->on('course_details')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id', 'language_id_fk_10763431')->references('id')->on('languages')->onDelete('cascade');
        });
    }
}
