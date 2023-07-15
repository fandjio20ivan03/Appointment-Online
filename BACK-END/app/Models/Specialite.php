<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = [ 'spec_nom' ];

    public function medecins()
    {
        return $this->hasMany(Medecin::class);
    }
}
