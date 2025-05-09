<?php

namespace Database\Seeders;

use App\Models\TypeVoertuig;
use Illuminate\Database\Seeder;

class TypeVoertuigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeVoertuigen = [
            ['type_voertuig' => 'Personenauto', 'rijbewijscategorie' => 'B'],
            ['type_voertuig' => 'Vrachtwagen', 'rijbewijscategorie' => 'C'],
            ['type_voertuig' => 'Bus', 'rijbewijscategorie' => 'D'],
            ['type_voertuig' => 'Bromfiets', 'rijbewijscategorie' => 'AM'],
            ['type_voertuig' => 'Motor', 'rijbewijscategorie' => 'A'],
        ];

        foreach ($typeVoertuigen as $type) {
            TypeVoertuig::create([
                'type_voertuig' => $type['type_voertuig'],
                'rijbewijscategorie' => $type['rijbewijscategorie'],
                'is_actief' => true,
                'datum_aangemaakt' => now(),
                'datum_gewijzigd' => now(),
            ]);
        }
    }
}
