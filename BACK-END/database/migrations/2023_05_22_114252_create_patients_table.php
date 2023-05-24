<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personne_id');
            $table->timestamps();

            $table->unique(['personne_id']);
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
