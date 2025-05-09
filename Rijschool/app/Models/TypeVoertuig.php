<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeVoertuig extends Model
{
    public $timestamps = false;

    private $primaryKey = 'id';

    protected $fillable = [
        'type_voertuig',
        'rijbewijscategorie',
        'is_actief',
        'opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];

    public function voertuigen()
    {
        return $this->hasMany(Voertuig::class);
    }
}
