<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'adm_nom',
        'adm_prenom',
        'adm_ville',
        'adm_dateNais',
        'adm_tel',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
