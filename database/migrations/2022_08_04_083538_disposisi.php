<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Disposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id('id_disposisi');
            $table->unsignedBigInteger('id_arsip_sm');
            $table->unsignedBigInteger('id_user_dari');
            $table->unsignedBigInteger('id_user_tujuan');
            $table->timestamps();
            $table->foreign('id_arsip_sm')->references('id_arsip_sm')->on('arsip_sm')->onDelete('cascade');
            $table->foreign('id_user_dari')->references('id_user')->on('user');
            $table->foreign('id_user_tujuan')->references('id_user')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi');
    }
}
