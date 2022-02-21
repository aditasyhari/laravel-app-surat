<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Template extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('template', function (Blueprint $table) {
            $table->id('id_template');
            $table->string('nama_template');
            $table->string('ukuran_hal');
            $table->string('orientasi_hal');
            $table->integer('m_atas');
            $table->integer('m_bawah');
            $table->integer('m_kanan');
            $table->integer('m_kiri');
            $table->longText('layout_konten');
            $table->longText('layout_kop');
            $table->enum('status_template', ['disetujui', 'ditolak', 'revisi', 'pending'])->default('pending');
            $table->string('revisi')->nullable();
            $table->boolean('read_validator')->default(0);
            $table->unsignedBigInteger('id_klasifikasi');
            $table->unsignedBigInteger('id_pembuat');
            $table->unsignedBigInteger('id_validator');
            $table->unsignedBigInteger('id_ttd');
            $table->timestamps();
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pembuat')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_validator')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ttd')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template');
    }
}
