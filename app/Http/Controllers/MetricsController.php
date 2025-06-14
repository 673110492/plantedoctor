<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Prometheus\CollectorRegistry;
use Prometheus\Storage\InMemory;
use Prometheus\RenderTextFormat;

class MetricsController extends Controller
{
     public function __invoke()
    {
        $registry = new CollectorRegistry(new InMemory());

        $counter = $registry->getOrRegisterCounter(
            'laravel_app',
            'http_requests_total',
            'Nombre total de requêtes HTTP',
            ['route']
        );

        // Incrémentation avec label "metrics"
        $counter->inc(['metrics']);

        // Export format Prometheus
        $renderer = new RenderTextFormat();
        $result = $renderer->render($registry->getMetricFamilySamples());

        return response($result, 200)
            ->header('Content-Type', RenderTextFormat::MIME_TYPE);
    }

}