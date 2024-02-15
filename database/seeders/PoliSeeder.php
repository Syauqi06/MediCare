<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $PoliData = [
            [
                'jenis_poli' => 'Poli Umum'
            ],
            [
                'jenis_poli' => 'Poli Gigi'
            ],
            [
                'jenis_poli' => 'Poli Anak'
            ],
        ];

        // looping data dengan foreach
        foreach ($PoliData as $val) {
            Poli::create($val);
        }
    }
}
