<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArsipSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('arsip_sk', function (Blueprint $table) {
            $table->id('id_arsip_sk');
            $table->string('no_sk');
            $table->date('tgl_surat');
            $table->string('klasifikasi');
            $table->string('tujuan_surat');
            $table->string('email_tujuan');
            $table->string('perihal');
            $table->string('ket');
            $table->string('file');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_sk');
    }
}
