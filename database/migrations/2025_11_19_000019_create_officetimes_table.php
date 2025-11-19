<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficetimesTable extends Migration
{
    public function up()
    {
        Schema::create('officetimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('days')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
