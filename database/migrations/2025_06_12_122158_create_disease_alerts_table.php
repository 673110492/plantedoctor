<?php
// database/migrations/xxxx_create_disease_alerts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disease_alerts', function (Blueprint $table) {
            $table->id();
            $table->string('disease_name');
            $table->string('plant_type');
            $table->string('location');
            $table->enum('risk_level', ['low', 'medium', 'high', 'critical']);
            $table->decimal('probability', 5, 2);
            $table->json('weather_conditions');
            $table->text('description');
            $table->text('recommendations');

            // Rendre nullable ou ajouter une valeur par défaut valide pour éviter l'erreur
            $table->timestamp('valid_from')->nullable()->useCurrent();
            $table->timestamp('valid_until')->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['location', 'risk_level', 'is_active']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('disease_alerts');
    }
};
