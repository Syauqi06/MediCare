<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PasienSeeder extends Seeder
{
    public function run()
    {
        DB::table('pasien')->insert([
            'id_akun' => 4,
            'nama_pasien' => 'qi',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'tangerang',
            'no_telp' => '1273',
            'no_bpjs' => 12345,
            'tgl_lahir' => '1990-01-01',
            'foto_profil' => 'logo.png',
        ]);
    }
}