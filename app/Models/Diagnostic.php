<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    use HasFactory;
    protected $fillable = ['image_path', 'predicted_class', 'confidence','maladie_id'];

    public function maladie()
    {
        return $this->belongsTo(Maladie::class);
    }
}
