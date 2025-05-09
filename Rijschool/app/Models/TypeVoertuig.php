<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVoertuig extends Model
{
    use HasFactory;

    protected $table = 'TypeVoertuig';
    public $timestamps = false;

    protected $fillable = [
        'type_voertuig',
        'rijbewijscategorie',
        'is_actief',
        'opmerking',
    ];

    public function voertuigen()
    {
        return $this->hasMany(Voertuig::class, 'type_voertuig_id');
    }
}
