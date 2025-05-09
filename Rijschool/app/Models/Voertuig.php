<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    use HasFactory;

    protected $table = 'Voertuigen';
    public $timestamps = false;

    protected $fillable = [
        'type_voertuig_id',
        'kentkenen',
        'type',
        'bouwjaar',
        'brandstof',
        'is_actief',
        'opmerking',
    ];

    public function typeVoertuig()
    {
        return $this->belongsTo(TypeVoertuig::class, 'type_voertuig_id');
    }

    public function instructeurs()
    {
        return $this->belongsToMany(Instructeur::class, 'VoertuigInstructeurs', 'voertuig_id', 'instructeur_id')
                    ->withPivot('datum_toekenning', 'is_actief', 'opmerking');
    }
}
