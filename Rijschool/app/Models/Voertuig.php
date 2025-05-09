<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    protected $fillable = [
        'type_voertuig_id',
        'kentkenen',
        'type',
        'bouwjaar',
        'brandstof',
        'is_actief',
        'opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];

    public $timestamps = false;
    
    public $primaryKey = 'id';

    public function typeVoertuig()
    {
        return $this->belongsTo(TypeVoertuig::class);
    }

    public function instructeurs()
    {
        return $this->belongsToMany(Instructeur::class, 'voertuig_instructeur')
                    ->withPivot(['datum_toekenning', 'is_actief', 'opmerking', 'datum_aangemaakt', 'datum_gewijzigd']);
    }
}
