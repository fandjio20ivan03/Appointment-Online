<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'password',
        'type',
        'remember_token'
    ];

    public function patient()
    {
        return $this->hasOne(Patient::class); // Définit une relation hasOne avec le modèle Patient
    }


    public function medecin()
    {
        return $this->hasOne(Medecin::class); // Définit une relation hasOne avec le modèle Medecin
    }

    public function admin()
    {
        return $this->hasOne(Admin::class); // Définit une relation hasOne avec le modèle Admin
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

}
