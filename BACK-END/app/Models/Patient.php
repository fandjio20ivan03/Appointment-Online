<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'pat_nom',
        'pat_prenom',
        'pat_ville',
        'pat_dateNais',
        'pat_tel',
        'user_id'
    ];
}
