<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackdateBanpemsTable extends Migration
{
    public function up()
    {
        Schema::create('backdate_banpems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year')->nullable();
            $table->string('kd_satker')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('nm_gapoktan')->nullable();
            $table->string('nm_barang')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->float('nominal', 15, 2)->nullable();
            $table->string('kd_giat')->nullable();
            $table->string('kd_akun')->nullable();
            $table->string('kwn')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
