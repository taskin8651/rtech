<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageProjectDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('language_project_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('project_detail_id');
            $table->foreign('project_detail_id', 'project_detail_id_fk_10763332')->references('id')->on('project_details')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id', 'language_id_fk_10763332')->references('id')->on('languages')->onDelete('cascade');
        });
    }
}
