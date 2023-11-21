<?php

namespace Database\Seeders;

use App\Models\Akun;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'resepsionis',
                'peran' => 'resepsionis',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'apoteker',
                'peran' => 'apoteker',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'admin',
                'peran' => 'admin',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'pasien',
                'peran' => 'pasien',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'asisten',
                'peran' => 'asisten',
                'password' => Hash::make('123')
            ]
        ];

        // looping data dengan foreach
        foreach ($userData as $val) {
            Akun::create($val);
        }
    }
        
    }

