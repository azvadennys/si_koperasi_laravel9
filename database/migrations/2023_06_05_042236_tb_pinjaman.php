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
    public function up()
    {
        Schema::create('tb_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('tb_anggota');
            $table->date('tanggal');
            $table->string('sumber_dana');
            $table->integer('lama_peminjaman');
            $table->bigInteger('jumlah');
            $table->bigInteger('bunga_perbulan');
            $table->timestamps();
        });

        Schema::create('tb_angsuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pinjaman')->constrained('tb_pinjaman');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pinjaman');
        Schema::dropIfExists('tb_angsuran');
    }
};
