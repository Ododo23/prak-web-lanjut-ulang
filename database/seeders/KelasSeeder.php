<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['nama_kelas' => 'Ilkom A'],
            ['nama_kelas' => 'Ilkom B'],
            ['nama_kelas' => 'Ilkom C'],
            ['nama_kelas' => 'Ilkom D'],
            ['nama_kelas' => 'Ilkom E'],
            ['nama_kelas' => 'Manajemen Informatika'],
        ]);
    }
}
