<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rendez_vous;
use App\Models\Medecin;
use App\Models\Patient;

class Calendrier extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function rendez_vous()
    {
        return $this->hasMany(Rendez_vous::class);
    }


    public function medecins()
    {
        return $this->hasMany(Medecin::class);
    }


    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
