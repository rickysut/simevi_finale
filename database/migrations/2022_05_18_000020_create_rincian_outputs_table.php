<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianOutputsTable extends Migration
{
    public function up()
    {
        Schema::create('rincian_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idoutp')->unique();
            $table->string('idoutp_1');
            $table->string('kdgiat')->nullable();
            $table->string('kdoutput')->nullable();
            $table->string('nmoutput')->nullable();
            $table->string('sat')->nullable();
            $table->string('kdsum')->nullable();
            $table->integer('thnawal')->nullable();
            $table->integer('thnakhir')->nullable();
            $table->integer('kdmulti')->nullable();
            $table->integer('kdjnsout')->nullable();
            $table->integer('kdikk')->nullable();
            $table->integer('kdtema')->nullable();
            $table->integer('kdcttout')->nullable();
            $table->integer('thang')->nullable();
            $table->integer('kdpn')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
