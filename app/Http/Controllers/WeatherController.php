<?php
// app/Http/Controllers/Api/WeatherAlertController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiseaseAlert;
use App\Models\WeatherData;
use App\Services\WeatherService;
use App\Services\DiseaseRiskAnalyzer;
use Illuminate\Http\Request;

class WeatherAlertController extends Controller
{
    public function getActiveAlerts(Request $request)
    {
        $location = $request->get('location', 'Bafoussam,CM');

        $alerts = DiseaseAlert::active()
            ->where('location', $location)
            ->orderBy('risk_level', 'desc')
            ->orderBy('probability', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $alerts,
            'location' => $location
        ]);
    }

    public function getCurrentWeather(Request $request)
    {
        $location = $request->get('location', 'Bafoussam,CM');

        $weather = WeatherData::byLocation($location)
            ->orderBy('recorded_at', 'desc')
            ->first();

        return response()->json([
            'status' => 'success',
            'data' => $weather,
            'location' => $location
        ]);
    }

    public function analyzeRisk(Request $request, DiseaseRiskAnalyzer $analyzer)
    {
        $location = $request->get('location', 'Bafoussam,CM');

        $alerts = $analyzer->analyzeRisk($location);

        return response()->json([
            'status' => 'success',
            'alerts_generated' => count($alerts),
            'data' => $alerts
        ]);
    }
}
