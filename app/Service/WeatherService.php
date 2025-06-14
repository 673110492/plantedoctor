<?php
// app/Services/WeatherService.php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\WeatherData;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    private $client;
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.weather.api_key');
        $this->baseUrl = config('services.weather.base_url');
    }

    public function fetchWeatherData($location, $lat = null, $lon = null)
    {
        try {
            $url = $this->baseUrl . '/weather';
            $params = [
                'appid' => $this->apiKey,
                'units' => 'metric'
            ];

            if ($lat && $lon) {
                $params['lat'] = $lat;
                $params['lon'] = $lon;
            } else {
                $params['q'] = $location;
            }

            $response = $this->client->get($url, ['query' => $params]);
            $data = json_decode($response->getBody(), true);

            return $this->saveWeatherData($data, $location);
        } catch (\Exception $e) {
            Log::error('Weather API Error: ' . $e->getMessage());
            return null;
        }
    }

    private function saveWeatherData($data, $location)
    {
        return WeatherData::create([
            'location' => $location,
            'latitude' => $data['coord']['lat'],
            'longitude' => $data['coord']['lon'],
            'temperature' => $data['main']['temp'],
            'humidity' => $data['main']['humidity'],
            'pressure' => $data['main']['pressure'],
            'wind_speed' => $data['wind']['speed'] ?? 0,
            'weather_condition' => $data['weather'][0]['main'],
            'precipitation' => $data['rain']['1h'] ?? 0,
            'recorded_at' => now()
        ]);
    }

    public function getForecast($location, $days = 5)
    {
        try {
            $url = $this->baseUrl . '/forecast';
            $response = $this->client->get($url, [
                'query' => [
                    'q' => $location,
                    'appid' => $this->apiKey,
                    'units' => 'metric',
                    'cnt' => $days * 8 // 8 forecasts per day (3-hour intervals)
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Weather Forecast Error: ' . $e->getMessage());
            return null;
        }
    }
}
