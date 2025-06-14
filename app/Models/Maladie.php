<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maladie extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
