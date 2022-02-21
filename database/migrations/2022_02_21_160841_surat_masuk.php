<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id('id_surat_masuk');
            $table->string('nomor_surat');
            $table->date('tgl_surat_fisik');
            $table->string('tujuan_surat');
            $table->string('email_tujuan');
            $table->string('klasifikasi');
            $table->string('perihal');
            $table->string('ket');
            $table->string('file');
            $table->boolean('read_sm')->default(0);
            $table->boolean('arsipkan')->default(0);
            $table->unsignedBigInteger('id_user')->default(0);
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
        Schema::dropIfExists('surat_masuk');
    }
}
