<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeVoertuigSeeder::class,
            InstructeurSeeder::class,
            VoertuigSeeder::class,
            VoertuigInstructeurSeeder::class,
        ]);
    }
}