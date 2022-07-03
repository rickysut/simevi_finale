<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPagusTable extends Migration
{
    public function up()
    {
        Schema::create('data_pagus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun');
            $table->string('kdsatker')->nullable();
            $table->string('ba')->nullable();
            $table->string('baes_1')->nullable();
            $table->string('akun')->nullable();
            $table->string('program')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('output')->nullable();
            $table->string('kewenangan')->nullable();
            $table->string('sumber_dana')->nullable();
            $table->string('cara_tarik')->nullable();
            $table->string('kdregister')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('budget_type')->nullable();
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
