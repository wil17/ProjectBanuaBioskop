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
        Schema::create('films', function (Blueprint $table) {
            // $table->id();
            $table->char('idfilms',5);
            $table->string('namafilm', 50);
            $table->string('durasi', 20);
            $table->string('genre', 30);
            $table->string('sutradara', 50);
            $table->string('sinopsis', 250);
            $table->primary('idfilms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
