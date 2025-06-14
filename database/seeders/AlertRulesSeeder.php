<?php
// database/seeders/AlertRulesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlertRule;

class AlertRulesSeeder extends Seeder
{
    public function run()
    {
        $rules = [
            [
                'disease_name' => 'Mildiou',
                'plant_type' => 'Tomate',
                'min_temperature' => 15,
                'max_temperature' => 25,
                'min_humidity' => 80,
                'min_precipitation' => 5,
                'duration_hours' => 48,
                'severity' => 'high'
            ],
            [
                'disease_name' => 'Rouille',
                'plant_type' => 'Café',
                'min_temperature' => 20,
                'max_temperature' => 30,
                'min_humidity' => 70,
                'duration_hours' => 24,
                'severity' => 'medium'
            ],
            [
                'disease_name' => 'Anthracnose',
                'plant_type' => 'Manguier',
                'min_temperature' => 25,
                'max_temperature' => 35,
                'min_humidity' => 85,
                'min_precipitation' => 10,
                'duration_hours' => 72,
                'severity' => 'critical'
            ]
        ];

        foreach ($rules as $rule) {
            AlertRule::create($rule);
        }
    }
}
