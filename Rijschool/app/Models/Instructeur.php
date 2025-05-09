<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructeur extends Model
{
    public $timestamps = false;

    private $primaryKey = 'id';

    protected $fillable = [
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'mobiel',
        'datum_in_dienst',
        'aantal_sterren',
        'is_actief',
        'opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];

    public function voertuigen()
    {
        return $this->belongsToMany(Voertuig::class, 'voertuig_instructeur')
                    ->withPivot(['datum_toekenning', 'is_actief', 'opmerking', 'datum_aangemaakt', 'datum_gewijzigd']);
    }
}
