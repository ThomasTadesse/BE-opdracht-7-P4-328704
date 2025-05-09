<?php

namespace Database\Factories;

use App\Models\TypeVoertuig;
use App\Models\Voertuig;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoertuigFactory extends Factory
{
    protected $model = Voertuig::class;

    public function definition(): array
    {
        $brandstofTypes = ['Benzine', 'Diesel', 'Elektrisch', 'Hybride'];
        
        return [
            'type_voertuig_id' => TypeVoertuig::inRandomOrder()->first()->id,
            'kentkenen' => strtoupper($this->faker->bothify('##-???-#')),
            'type' => $this->faker->word(),
            'bouwjaar' => $this->faker->dateTimeBetween('-15 years', '-1 year'),
            'brandstof' => $this->faker->randomElement($brandstofTypes),
            'is_actief' => true,
            'opmerking' => $this->faker->optional(0.3)->sentence(),
            'datum_aangemaakt' => now(),
            'datum_gewijzigd' => now(),
        ];
    }
}
