<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructeur extends Model
{
    use HasFactory;

    protected $table = 'Instructeurs';
    public $timestamps = false;

    protected $fillable = [
        'voornaam',
        'tussenvoegsel',
        'achternaam',
        'mobiel',
        'datum_in_dienst',
        'aantal_sterren',
        'is_actief',
        'opmerking',
    ];

    public function voertuigen()
    {
        return $this->belongsToMany(Voertuig::class, 'VoertuigInstructeurs', 'instructeur_id', 'voertuig_id')
                    ->withPivot('datum_toekenning', 'is_actief', 'opmerking');
    }
}
