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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique()->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            //Users: 0=>patient, 1=>medecin, 2=>admin
            $table->rememberToken();
            $table->timestamps();
        });
        // $table->string('date_de_naissance')->nullable();
        // $table->string('ville')->nullable();
        // $table->string('num_tel')->unique()->nullable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
