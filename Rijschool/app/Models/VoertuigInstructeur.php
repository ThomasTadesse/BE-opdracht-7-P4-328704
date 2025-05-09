<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoertuigInstructeur extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = 'voertuig_instructeur';

    public $primaryKey = 'id';

    protected $fillable = [
        'voertuig_id',
        'instructeur_id',
        'datum_toekenning',
        'is_actief',
        'opmerking',
        'datum_aangemaakt',
        'datum_gewijzigd',
    ];

    public function voertuig()
    {
        return $this->belongsTo(Voertuig::class);
    }

    public function instructeur()
    {
        return $this->belongsTo(Instructeur::class);
    }
}
