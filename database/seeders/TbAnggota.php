<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbAnggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `tb_anggota` (`id`, `nama`, `nip`, `unit_kerja`, `tanggal`, `no_telepon`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
        (2, 'dadwad', 2313, 'dwadwa', '3323-03-21', '3213213213', 'dwadaw', 'aktif', '2023-05-21 20:05:03', NULL),
        (3, 'dwada', 23131, 'dwada', '3213-03-21', '231312', 'dwada', 'aktif', '2023-05-21 20:05:17', NULL);");

//         DB::insert("INSERT INTO `tb_periode` (`id`, `nama`, `tanggal_mulai`, `tanggal_akhir`, `status`, `created_at`, `updated_at`) VALUES
// (1, 'dadwaddwadawd', '2023-05-16', '2023-05-25', 'tidak aktif', '2023-05-21 20:17:27', '2023-05-21 20:22:57'),
// (2, 'dwadda', '2023-05-16', '2023-05-25', 'aktif', '2023-05-21 20:17:27', '2023-05-21 20:22:57');");
    }
}
