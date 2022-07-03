<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKegiatansTable extends Migration
{
    public function up()
    {
        Schema::create('master_kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kddept')->nullable();
            $table->string('kdunit')->nullable();
            $table->string('kd_kegiatan')->nullable();
            $table->string('direktorat')->nullable();
            $table->string('nomenklatur_giat')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
