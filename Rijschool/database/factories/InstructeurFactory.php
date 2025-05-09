<?php

namespace Database\Factories;

use App\Models\Instructeur;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructeurFactory extends Factory
{
    protected $model = Instructeur::class;

    public function definition(): array
    {
        return [
            'voornaam' => $this->faker->firstName(),
            'tussenvoegsel' => $this->faker->optional(0.3)->randomElement(['van', 'de', 'van der', 'den']),
            'achternaam' => $this->faker->lastName(),
            'mobiel' => $this->faker->phoneNumber(),
            'datum_in_dienst' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'aantal_sterren' => $this->faker->numberBetween(1, 5),
            'is_actief' => true,
            'opmerking' => $this->faker->optional(0.3)->sentence(),
            'datum_aangemaakt' => now(),
            'datum_gewijzigd' => now(),
        ];
    }
}
