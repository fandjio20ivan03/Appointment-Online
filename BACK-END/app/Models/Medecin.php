<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'Med_nom',
        'Med_prenom',
        'Med_ville',
        'Med_dateNais',
        'Med_tel',
        'specialite_id',
        'user_id'
    ];
}
