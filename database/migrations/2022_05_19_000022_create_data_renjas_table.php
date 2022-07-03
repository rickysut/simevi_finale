<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRenjasTable extends Migration
{
    public function up()
    {
        Schema::create('data_renjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thang');
            $table->string('kdjendok')->nullable();
            $table->string('kdsatker')->nullable();
            $table->string('kddept')->nullable();
            $table->string('kdunit')->nullable();
            $table->string('kdprogram')->nullable();
            $table->string('kdgiat')->nullable();
            $table->string('kdoutput')->nullable();
            $table->string('kdlokasi')->nullable();
            $table->string('kdkabkota')->nullable();
            $table->string('kddekon')->nullable();
            $table->string('kdsoutput')->nullable();
            $table->string('kdkmpnen')->nullable();
            $table->string('kdskmpnen')->nullable();
            $table->string('kdakun')->nullable();
            $table->string('kdkppn')->nullable();
            $table->string('kdbeban')->nullable();
            $table->string('kdjnsban')->nullable();
            $table->string('kdctarik')->nullable();
            $table->string('register')->nullable();
            $table->string('carahitung')->nullable();
            $table->string('header1')->nullable();
            $table->string('header2')->nullable();
            $table->string('kdheader')->nullable();
            $table->integer('noitem')->nullable();
            $table->string('nmitem')->nullable();
            $table->float('vol1', 13, 2)->nullable();
            $table->string('sat1')->nullable();
            $table->float('vol2', 13, 2)->nullable();
            $table->string('sat2')->nullable();
            $table->float('vol3', 13, 2)->nullable();
            $table->string('sat3')->nullable();
            $table->float('vol4', 13, 2)->nullable();
            $table->string('sat4')->nullable();
            $table->float('volkeg', 13, 2)->nullable();
            $table->string('satkeg')->nullable();
            $table->float('hargasat', 13, 2)->nullable();
            $table->float('jumlah', 13, 2)->nullable();
            $table->float('jumlah2', 13, 2)->nullable();
            $table->string('paguphln')->nullable();
            $table->string('pagurmp')->nullable();
            $table->string('pagurkp')->nullable();
            $table->string('kdblokir')->nullable();
            $table->string('blokirphln')->nullable();
            $table->string('blokirrmp')->nullable();
            $table->string('blokirrkp')->nullable();
            $table->string('rphblokir')->nullable();
            $table->string('kdcopy')->nullable();
            $table->string('kdabt')->nullable();
            $table->string('kdsbu')->nullable();
            $table->float('volsbk', 13, 2)->nullable();
            $table->float('volrkakl', 13, 2)->nullable();
            $table->string('blnkontrak')->nullable();
            $table->string('nokontrak')->nullable();
            $table->string('tgkontrak')->nullable();
            $table->string('nilkontrak')->nullable();
            $table->string('januari')->nullable();
            $table->string('pebruari')->nullable();
            $table->string('maret')->nullable();
            $table->string('april')->nullable();
            $table->string('mei')->nullable();
            $table->string('juni')->nullable();
            $table->string('juli')->nullable();
            $table->string('agustus')->nullable();
            $table->string('september')->nullable();
            $table->string('oktober')->nullable();
            $table->string('nopember')->nullable();
            $table->string('desember')->nullable();
            $table->string('jmltunda')->nullable();
            $table->string('kdluncuran')->nullable();
            $table->string('jmlabt')->nullable();
            $table->string('norev')->nullable();
            $table->string('kdubah')->nullable();
            $table->float('kurs', 13, 2)->nullable();
            $table->float('indexkpjm', 9, 4)->nullable();
            $table->string('kdib')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
