<?php
// app/Models/DiseaseAlert.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_name',
        'plant_type',
        'location',
        'risk_level',
        'probability',
        'weather_conditions',
        'description',
        'recommendations',
        'valid_from',
        'valid_until',
        'is_active'
    ];

    protected $casts = [
        'weather_conditions' => 'array',
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'probability' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where('valid_from', '<=', now())
                    ->where('valid_until', '>=', now());
    }

    public function scopeByRiskLevel($query, $level)
    {
        return $query->where('risk_level', $level);
    }
}
