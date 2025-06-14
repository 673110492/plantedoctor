<?php
// app/Console/Commands/AnalyzeDiseaseRisk.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\DiseaseRiskAnalyzer;

class AnalyzeDiseaseRisk extends Command
{
    protected $signature = 'disease:analyze {location?}';
    protected $description = 'Analyze disease risk for specified location';

    public function handle(DiseaseRiskAnalyzer $analyzer)
    {
        $location = $this->argument('location') ?? 'Bafoussam,CM';

        $this->info("Analyse des risques de maladie pour {$location}...");

        $alerts = $analyzer->analyzeRisk($location);

        if (empty($alerts)) {
            $this->info("Aucun risque détecté pour le moment.");
        } else {
            $this->info(count($alerts) . " alerte(s) générée(s) !");

            foreach ($alerts as $alert) {
                $this->line("- {$alert->disease_name} ({$alert->plant_type}): {$alert->risk_level}");
            }
        }
    }
}
