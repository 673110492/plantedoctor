<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conseils', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nom_scientifique')->nullable();
            $table->text('description_courte')->nullable();
            $table->text('symptomes')->nullable();
            $table->text('causes')->nullable();
            $table->text('mesures_preventives')->nullable();
            $table->text('controle_biologique')->nullable();
            $table->text('controle_chimique')->nullable();
            $table->string('image_principale_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conseils');
    }
};
