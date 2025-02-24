<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'statut',
        'dateParrainage',
        'numeroCarteElecteur',
        'numeroCarteElecteurCandidat',
    ];

    public function electeur()
    {
        return $this->belongsTo(Electeur::class, 'numeroCarteElecteur');
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'numeroCarteElecteurCandidat');
    }
}

