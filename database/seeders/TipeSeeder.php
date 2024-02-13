<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipe')->insert([
            'nama_tipe' => 'Hayuk',
        ]);
    }
}