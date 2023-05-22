<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('tb_detail_transaksi_mobil', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('transaksi_id');
    //         $table->foreign('transaksi_id')->references('id')->on('tb_transaksi')->onDelete('cascade')->cascadeOnUpdate();
    //         $table->string('mobil_id', 20);
    //         $table->foreign('mobil_id')->references('id_mobil')->on('tb_mobil')->onDelete('cascade')->cascadeOnUpdate();
    //         $table->timestamps();
    //     });

    //     Schema::create('tb_detail_transaksi_supir', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('transaksi_id');
    //         $table->foreign('transaksi_id')->references('id')->on('tb_transaksi')->onDelete('cascade')->cascadeOnUpdate();
    //         $table->unsignedBigInteger('supir_id');
    //         $table->foreign('supir_id')->references('id')->on('tb_supir')->onDelete('cascade')->cascadeOnUpdate();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('tb_detail_transaksi_mobil');
    //     Schema::dropIfExists('tb_detail_transaksi_supir');
    // }
};
