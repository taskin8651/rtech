<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubesTable extends Migration
{
    public function up()
    {
        Schema::create('youtubes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
