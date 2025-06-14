<?php
// app/Console/Commands/FetchWeatherData.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherService;

class FetchWeatherData extends Command
{
    protected $signature = 'weather:fetch {location?}';
    protected $description = 'Fetch weather data for specified location';

    public function handle(WeatherService $weatherService)
    {
        $location = $this->argument('location') ?? 'Bafoussam,CM';

        $this->info("Récupération des données météo pour {$location}...");

        $weather = $weatherService->fetchWeatherData($location);

        if ($weather) {
            $this->info("Données météo sauvegardées avec succès !");
            $this->table(
                ['Paramètre', 'Valeur'],
                [
                    ['Température', $weather->temperature . '°C'],
                    ['Humidité', $weather->humidity . '%'],
                    ['Pression', $weather->pressure . ' hPa'],
                    ['Condition', $weather->weather_condition]
                ]
            );
        } else {
            $this->error("Erreur lors de la récupération des données météo.");
        }
    }
}
