<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Umum',
            'Gigi',
            'Gizi',
        ];
        
        foreach ($data as $item) {
            DB::table('poli')->insert([
                'jenis_poli' => $item,
            ]);
        }
    }
}
