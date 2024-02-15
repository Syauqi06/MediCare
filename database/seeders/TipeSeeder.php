<?php

namespace Database\Seeders;

use App\Models\Tipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TipeData = [
            [
                'nama_tipe' => 'Obat Pusing'
            ],
            [
                'nama_tipe' => 'Obat Flu'
            ],
            [
                'nama_tipe' => 'Obat Batuk'
            ],
        ];

        // looping data dengan foreach
        foreach ($TipeData as $val) {
            Tipe::create($val);
        }
    }
}
