<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                // 'role' => 'admin',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Admin1',
                'email' => 'admin1@gmail.com',
                'email_verified_at' => now(),
                // 'role' => 'admin',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                // 'role' => 'user',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        $this->call([
            TbAnggota::class,
            // TbSupirSeeder::class,

        ]);
    }
}
