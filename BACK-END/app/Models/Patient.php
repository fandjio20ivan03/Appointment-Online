<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public $timestamps = false;
      
    protected $fillable = [
        'pers_nom',
        'pers_prenom',
        'pers_ville',
        'pers_dateNais',
        'pers_email',
        'pers_tel'
    ];
}
