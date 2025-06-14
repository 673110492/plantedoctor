<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeatherAlertController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Routes dédiées à l'API, chargées par RouteServiceProvider,
| avec middleware 'api' par défaut.
|
*/

// Routes publiques
Route::post('/login', [ApiAuthController::class, 'login'])->name('api.login');

// Routes protégées par Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Infos utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('api.user');

    // Déconnexion
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('api.logout');

    // Ressource utilisateurs API
    Route::apiResource('users', UserController::class, [
        'as' => 'api' // prefixe les noms de routes par 'api.'
    ]);
});


Route::prefix('weather-alerts')->group(function () {
    Route::get('/active', [WeatherAlertController::class, 'getActiveAlerts']);
    Route::get('/current-weather', [WeatherAlertController::class, 'getCurrentWeather']);
    Route::post('/analyze', [WeatherAlertController::class, 'analyzeRisk']);
});
