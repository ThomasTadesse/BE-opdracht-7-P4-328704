<?php

namespace Database\Factories;

use App\Models\TypeVoertuig;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeVoertuigFactory extends Factory
{
    protected $model = TypeVoertuig::class;

    public function definition(): array
    {
        $types = [
            ['Personenauto', 'B'],
            ['Vrachtwagen', 'C'],
            ['Bus', 'D'],
            ['Bromfiets', 'AM'],
            ['Motor', 'A'],
        ];
        
        $randomType = $this->faker->randomElement($types);
        
        return [
            'type_voertuig' => $randomType[0],
            'rijbewijscategorie' => $randomType[1],
            'is_actief' => true,
            'opmerking' => $this->faker->optional(0.3)->sentence(),
            'datum_aangemaakt' => now(),
            'datum_gewijzigd' => now(),
        ];
    }
}
