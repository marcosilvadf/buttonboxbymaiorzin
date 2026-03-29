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
        Schema::create('game_version_mods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_mod_id')
                ->constrained('game_mods')
                ->cascadeOnDelete();
            $table->string('version', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_version_mods');
    }
};
