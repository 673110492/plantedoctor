<?php
// database/migrations/xxxx_create_alert_rules_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alert_rules', function (Blueprint $table) {
            $table->id();
            $table->string('disease_name');
            $table->string('plant_type');
            $table->decimal('min_temperature', 5, 2)->nullable();
            $table->decimal('max_temperature', 5, 2)->nullable();
            $table->decimal('min_humidity', 5, 2)->nullable();
            $table->decimal('max_humidity', 5, 2)->nullable();
            $table->decimal('min_pressure', 7, 2)->nullable();
            $table->decimal('max_pressure', 7, 2)->nullable();
            $table->decimal('min_precipitation', 5, 2)->nullable();
            $table->integer('duration_hours')->default(24);
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alert_rules');
    }
};
