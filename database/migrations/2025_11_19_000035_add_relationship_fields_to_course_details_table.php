<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('course_details', function (Blueprint $table) {
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->foreign('instructor_id', 'instructor_fk_10763422')->references('id')->on('instructors');
        });
    }
}
