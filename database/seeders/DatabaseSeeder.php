<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\RekamMedis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AkunSeeder::class,
            PoliSeeder::class,
            PasienSeeder::class,
            DokterSeeder::class,
            TipeSeeder::class,
            RekamMedisSeeder::class,
            ResepDokterSeeder::class,
        ]);
    }
}
