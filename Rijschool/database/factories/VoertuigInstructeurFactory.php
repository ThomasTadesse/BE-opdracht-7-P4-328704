<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Voertuig;
use App\Models\Instructeur;
use App\Models\VoertuigInstructeur;

class VoertuigInstructeurFactory extends Factory
{
    protected $table = 'voertuig_instructeur';

    public function definition(): array
    {
        return [
            'voertuig_id' => Voertuig::inRandomOrder()->first()->id ?? Voertuig::factory(),
            'instructeur_id' => Instructeur::inRandomOrder()->first()->id ?? Instructeur::factory(),
            'datum_toekenning' => now()->subDays(30)->toDateString(),
            'is_actief' => true,
            'opmerking' => null,
            'datum_aangemaakt' => now(),
            'datum_gewijzigd' => now(),
        ];
    }
}
