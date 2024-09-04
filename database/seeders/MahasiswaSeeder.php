<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'nama'=>'Fajar',
            'nomor_induk'=>'1000',
            'jurusan'=>'Informatika',
            'alamat'=>'Depok',
            'SKS'=>'Paket 2',
            'Email'=>'Fajar12@gmail.com',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
