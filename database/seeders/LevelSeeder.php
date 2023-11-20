<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levelData = [
            ['nama_level' => 'apoteker'],
            ['nama_level' => 'asisten dokter'],
            ['nama_level' => 'pasien'],
            ['nama_level' => 'resepsionis'],
            ['nama_level' => 'superadmin']
        ];

        foreach ($levelData as $data) {
            Level::create($data);
        }
    }
}
