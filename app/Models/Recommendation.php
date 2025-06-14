<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
     protected $fillable = ['maladie_id', 'contenu'];

    public function maladie()
    {
        return $this->belongsTo(Maladie::class);
    }
}
