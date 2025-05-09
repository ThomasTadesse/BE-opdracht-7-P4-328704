<?php

namespace Database\Seeders;

use App\Models\Instructeur;
use Illuminate\Database\Seeder;

class InstructeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructeurs = [
            [
                'voornaam' => 'Jan',
                'tussenvoegsel' => 'van',
                'achternaam' => 'Dijk',
                'mobiel' => '06-12345678',
                'datum_in_dienst' => '2018-02-01',
                'aantal_sterren' => 4,
            ],
            [
                'voornaam' => 'Lisa',
                'tussenvoegsel' => null,
                'achternaam' => 'Beekman',
                'mobiel' => '06-23456789',
                'datum_in_dienst' => '2019-05-15',
                'aantal_sterren' => 3,
            ],
            [
                'voornaam' => 'Mohammed',
                'tussenvoegsel' => null,
                'achternaam' => 'El Yassidi',
                'mobiel' => '06-34567890',
                'datum_in_dienst' => '2020-01-10',
                'aantal_sterren' => 5,
            ],
        ];

        foreach ($instructeurs as $instructeur) {
            Instructeur::create([
                'voornaam' => $instructeur['voornaam'],
                'tussenvoegsel' => $instructeur['tussenvoegsel'],
                'achternaam' => $instructeur['achternaam'],
                'mobiel' => $instructeur['mobiel'],
                'datum_in_dienst' => $instructeur['datum_in_dienst'],
                'aantal_sterren' => $instructeur['aantal_sterren'],
                'is_actief' => true,
                'datum_aangemaakt' => now(),
                'datum_gewijzigd' => now(),
            ]);
        }
    }
}
