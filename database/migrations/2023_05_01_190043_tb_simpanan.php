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
        Schema::create('tb_simpanan_pokok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('tb_anggota');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
        Schema::create('tb_simpanan_wajib', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('tb_anggota');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
        Schema::create('tb_simpanan_khusus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('tb_anggota');
            $table->date('tanggal');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
        Schema::create('tb_pengambilan_simpanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anggota')->constrained('tb_anggota');
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
        Schema::dropIfExists('tb_simpanan_pokok');
    }
};
