<?php

namespace Database\Seeders;

use App\Models\TypeVoertuig;
use App\Models\Voertuig;
use Illuminate\Database\Seeder;

class VoertuigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voertuigen = [
            [
                'type_voertuig_id' => 1, // Personenauto
                'kentkenen' => 'AU-67-IO',
                'type' => 'Golf',
                'bouwjaar' => '2017-06-12',
                'brandstof' => 'Benzine',
            ],
            [
                'type_voertuig_id' => 1, // Personenauto
                'kentkenen' => 'TR-24-OP',
                'type' => 'Polo',
                'bouwjaar' => '2019-05-23',
                'brandstof' => 'Diesel',
            ],
            [
                'type_voertuig_id' => 2, // Vrachtwagen
                'kentkenen' => 'TY-78-KL',
                'type' => 'DAF',
                'bouwjaar' => '2018-01-01',
                'brandstof' => 'Diesel',
            ],
            [
                'type_voertuig_id' => 3, // Bus
                'kentkenen' => 'UU-34-KK',
                'type' => 'Mercedes',
                'bouwjaar' => '2020-04-04',
                'brandstof' => 'Elektrisch',
            ],
            [
                'type_voertuig_id' => 5, // Motor
                'kentkenen' => 'MM-77-FF',
                'type' => 'Suzuki',
                'bouwjaar' => '2021-06-07',
                'brandstof' => 'Benzine',
            ],
        ];

        foreach ($voertuigen as $voertuig) {
            Voertuig::create([
                'type_voertuig_id' => $voertuig['type_voertuig_id'],
                'kentkenen' => $voertuig['kentkenen'],
                'type' => $voertuig['type'],
                'bouwjaar' => $voertuig['bouwjaar'],
                'brandstof' => $voertuig['brandstof'],
                'is_actief' => true,
                'datum_aangemaakt' => now(),
                'datum_gewijzigd' => now(),
            ]);
        }
    }
}
