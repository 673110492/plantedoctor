<?php
// app/Services/DiseaseRiskAnalyzer.php

namespace App\Services;

use App\Models\WeatherData;
use App\Models\AlertRule;
use App\Models\DiseaseAlert;
use Carbon\Carbon;

class DiseaseRiskAnalyzer
{
    public function analyzeRisk($location)
    {
        $recentWeather = WeatherData::byLocation($location)
            ->recent(24)
            ->orderBy('recorded_at', 'desc')
            ->get();

        if ($recentWeather->isEmpty()) {
            return [];
        }

        $alertRules = AlertRule::where('is_active', true)->get();
        $alerts = [];

        foreach ($alertRules as $rule) {
            $riskLevel = $this->calculateRiskLevel($recentWeather, $rule);

            if ($riskLevel > 0) {
                $alerts[] = $this->createAlert($rule, $location, $riskLevel, $recentWeather);
            }
        }

        return $alerts;
    }

    private function calculateRiskLevel($weatherData, $rule)
    {
        $riskFactors = 0;
        $totalFactors = 0;

        $avgWeather = $this->calculateAverageWeather($weatherData);

        // Vérifier la température
        if ($rule->min_temperature !== null || $rule->max_temperature !== null) {
            $totalFactors++;
            if ($this->isInRange($avgWeather['temperature'], $rule->min_temperature, $rule->max_temperature)) {
                $riskFactors++;
            }
        }

        // Vérifier l'humidité
        if ($rule->min_humidity !== null || $rule->max_humidity !== null) {
            $totalFactors++;
            if ($this->isInRange($avgWeather['humidity'], $rule->min_humidity, $rule->max_humidity)) {
                $riskFactors++;
            }
        }

        // Vérifier la pression
        if ($rule->min_pressure !== null || $rule->max_pressure !== null) {
            $totalFactors++;
            if ($this->isInRange($avgWeather['pressure'], $rule->min_pressure, $rule->max_pressure)) {
                $riskFactors++;
            }
        }

        // Vérifier les précipitations
        if ($rule->min_precipitation !== null) {
            $totalFactors++;
            if ($avgWeather['precipitation'] >= $rule->min_precipitation) {
                $riskFactors++;
            }
        }

        return $totalFactors > 0 ? ($riskFactors / $totalFactors) * 100 : 0;
    }

    private function calculateAverageWeather($weatherData)
    {
        return [
            'temperature' => $weatherData->avg('temperature'),
            'humidity' => $weatherData->avg('humidity'),
            'pressure' => $weatherData->avg('pressure'),
            'precipitation' => $weatherData->sum('precipitation')
        ];
    }

    private function isInRange($value, $min, $max)
    {
        $minCheck = $min === null || $value >= $min;
        $maxCheck = $max === null || $value <= $max;
        return $minCheck && $maxCheck;
    }

    private function createAlert($rule, $location, $probability, $weatherData)
    {
        $riskLevel = $this->getRiskLevel($probability);

        return DiseaseAlert::create([
            'disease_name' => $rule->disease_name,
            'plant_type' => $rule->plant_type,
            'location' => $location,
            'risk_level' => $riskLevel,
            'probability' => $probability,
            'weather_conditions' => $this->calculateAverageWeather($weatherData),
            'description' => $this->generateDescription($rule, $probability),
            'recommendations' => $this->generateRecommendations($rule, $riskLevel),
            'valid_from' => now(),
            'valid_until' => now()->addHours($rule->duration_hours),
            'is_active' => true
        ]);
    }

    private function getRiskLevel($probability)
    {
        if ($probability >= 80) return 'critical';
        if ($probability >= 60) return 'high';
        if ($probability >= 40) return 'medium';
        return 'low';
    }

    private function generateDescription($rule, $probability)
    {
        return "Risque de {$rule->disease_name} détecté pour {$rule->plant_type} avec une probabilité de {$probability}%. Les conditions météorologiques actuelles favorisent le développement de cette maladie.";
    }

    private function generateRecommendations($rule, $riskLevel)
    {
        $recommendations = [
            'low' => 'Surveillance recommandée. Vérifiez vos plants régulièrement.',
            'medium' => 'Mesures préventives recommandées. Évitez l\'arrosage des feuilles.',
            'high' => 'Action immédiate recommandée. Appliquez un traitement préventif.',
            'critical' => 'Action urgente requise. Isolez les plants affectés et traitez immédiatement.'
        ];

        return $recommendations[$riskLevel] ?? $recommendations['low'];
    }
}
