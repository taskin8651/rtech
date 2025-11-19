<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('category')->nullable();
            $table->string('duration')->nullable();
            $table->string('batch')->nullable();
            $table->string('lesson')->nullable();
            $table->string('student')->nullable();
            $table->string('skill_level')->nullable();
            $table->string('language')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
