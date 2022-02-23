<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArsipSm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('arsip_sm', function (Blueprint $table) {
            $table->id('id_arsip_sm');
            $table->string('no_sm');
            $table->date('tgl_surat_diterima');
            $table->date('tgl_surat_fisik');
            $table->string('klasifikasi');
            $table->string('tujuan_surat');
            $table->unsignedBigInteger('id_user');
            $table->string('email_tujuan');
            $table->string('perihal');
            $table->string('ket');
            $table->string('file');
            $table->boolean('read')->default(0);
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
        Schema::dropIfExists('arsip_sm');
    }
}
