<?php
// app/Models/WeatherData.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class WeatherData extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'latitude',
        'longitude',
        'temperature',
        'humidity',
        'pressure',
        'wind_speed',
        'weather_condition',
        'precipitation',
        'recorded_at'
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
        'temperature' => 'decimal:2',
        'humidity' => 'decimal:2',
        'pressure' => 'decimal:2',
        'wind_speed' => 'decimal:2',
        'precipitation' => 'decimal:2',
    ];

    public function scopeRecent($query, $hours = 24)
    {
        return $query->where('recorded_at', '>=', Carbon::now()->subHours($hours));
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', $location);
    }
}
