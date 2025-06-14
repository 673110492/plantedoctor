<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRolesAndPermissions;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'photo',
        'statut',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_naissance' => 'date',
        'statut' => 'boolean',
        'two_factor_expires_at' => 'datetime',  // <-- Ajouté ici
    ];

    public function setStatutAttribute($value)
    {
        if ($this->email === 'rincedonfack@gmail.com') {
            // Bloquer la modification du statut pour l'admin
            return;
        }
        $this->attributes['statut'] = $value;
    }

    public function forums()
    {
        return $this->belongsToMany(Forum::class, 'forum_user');
    }

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function generateTwoFactorCode()
    {
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();

        Mail::to($this->email)->send(new \App\Mail\TwoFactorCodeMail($this));
    }

    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
