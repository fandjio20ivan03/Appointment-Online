<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendez_vous extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'heure_debut',
        'heure_fin',
        'role',
        'medecin_id',
        'patient_id'
    ];

    // La relation entre le rendez-vous et le médecin
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    // La relation entre le rendez-vous et le patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
