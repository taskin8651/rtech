<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailLessonPivotTable extends Migration
{
    public function up()
    {
        Schema::create('course_detail_lesson', function (Blueprint $table) {
            $table->unsignedBigInteger('course_detail_id');
            $table->foreign('course_detail_id', 'course_detail_id_fk_10763432')->references('id')->on('course_details')->onDelete('cascade');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id', 'lesson_id_fk_10763432')->references('id')->on('lessons')->onDelete('cascade');
        });
    }
}
