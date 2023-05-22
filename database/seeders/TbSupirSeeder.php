<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbSupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `tb_supir` (`id`, `Nama_Supir`, `Alamat`, `Jenis_Kelamin`, `No_Telepon`) VALUES
        ('1', 'Azis', 'Jl. Kelinci', 'L', '085260306090'),
        ('2', 'Bondan', 'Jl. Anggrek', 'L', '085212345679'),
        ('3', 'Darsono', 'Jl. Simpang', 'L', '085298765412'),
        ('4', 'Eko', 'Jl. Bersama', 'L', '085213245768'),
        ('5', 'Jarwo', 'Jl. Kemuning', 'L', '085211992288'),
        ('6', 'Mamat', 'Jl. Damai', 'L', '085230601234'),
        ('7', 'Paijo', 'Jl. Keluarga', 'L', '085265432198'),
        ('8', 'Sarimin', 'Jl. Flamboyan', 'L', '08525678900'),
        ('9', 'Tatang', 'Jl. Buaya', 'L', '085224136857'),
        ('10', 'Ucup', 'Jl. Tulip', 'L', '085233776644');");
    }
}
