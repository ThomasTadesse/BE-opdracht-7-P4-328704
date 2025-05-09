<?php

namespace Database\Seeders;

use App\Models\Instructeur;
use App\Models\Voertuig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoertuigInstructeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toewijzingen = [
            [
                'voertuig_id' => 1,
                'instructeur_id' => 1,
                'datum_toekenning' => '2020-02-01',
            ],
            [
                'voertuig_id' => 2,
                'instructeur_id' => 2,
                'datum_toekenning' => '2021-03-01',
            ],
            [
                'voertuig_id' => 3,
                'instructeur_id' => 3,
                'datum_toekenning' => '2022-02-01',
            ],
            [
                'voertuig_id' => 4,
                'instructeur_id' => 1,
                'datum_toekenning' => '2022-04-01',
            ],
            [
                'voertuig_id' => 5,
                'instructeur_id' => 2,
                'datum_toekenning' => '2021-05-15',
            ],
        ];

        foreach ($toewijzingen as $toewijzing) {
            DB::table('VoertuigInstructeurs')->insert([
                'voertuig_id' => $toewijzing['voertuig_id'],
                'instructeur_id' => $toewijzing['instructeur_id'],
                'datum_toekenning' => $toewijzing['datum_toekenning'],
                'is_actief' => true,
                'datum_aangemaakt' => now(),
                'datum_gewijzigd' => now(),
            ]);
        }
    }
}
