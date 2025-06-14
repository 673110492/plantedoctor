<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Récupérer les données météo toutes les 30 minutes
        $schedule->command('weather:fetch')
                 ->everyThirtyMinutes()
                 ->withoutOverlapping();

        // Analyser les risques toutes les heures
        $schedule->command('disease:analyze')
                 ->hourly()
                 ->withoutOverlapping();

        // Nettoyer les anciennes données météo (plus de 7 jours)
        $schedule->command('weather:cleanup')
                 ->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
