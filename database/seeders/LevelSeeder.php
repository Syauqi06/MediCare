<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            'Admin',
            'Apoteker',
            'Asisten Dokter',
            'Pasien',
            'Resepsionis',
        ];
        
        foreach ($levels as $lvl) {
            DB::table('level')->insert([
                'nama_level' => $lvl,
            ]);
        }        
    }
}
