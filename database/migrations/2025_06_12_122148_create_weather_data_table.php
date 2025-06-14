<?php
// database/migrations/xxxx_xx_xx_create_weather_data_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('weather_data', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->decimal('temperature', 5, 2);
            $table->decimal('humidity', 5, 2);
            $table->decimal('pressure', 7, 2);
            $table->decimal('wind_speed', 5, 2);
            $table->string('weather_condition');
            $table->decimal('precipitation', 5, 2)->default(0);
            $table->timestamp('recorded_at')->useCurrent();
            $table->timestamps();

            $table->index(['location', 'recorded_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather_data');
    }
};
