<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
