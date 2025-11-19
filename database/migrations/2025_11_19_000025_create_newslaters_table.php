<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewslatersTable extends Migration
{
    public function up()
    {
        Schema::create('newslaters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
