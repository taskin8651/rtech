<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('project_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10763320')->references('id')->on('users');
            $table->unsignedBigInteger('project_type_id')->nullable();
            $table->foreign('project_type_id', 'project_type_fk_10763321')->references('id')->on('project_types');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10763325')->references('id')->on('users');
        });
    }
}
