<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conseil extends Model
{
    use HasFactory;
     protected $fillable = [
        'nom',
        'nom_scientifique',
        'description_courte',
        'symptomes',
        'causes',
        'mesures_preventives',
        'controle_biologique',
        'controle_chimique',
        'image_principale_url',
    ];
}
