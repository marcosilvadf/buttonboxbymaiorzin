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
        Schema::create('mods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('game_mod_id')
                ->constrained('game_mods')
                ->cascadeOnDelete();

            $table->foreignId('game_version_mod_id')
                ->constrained('game_version_mods')
                ->cascadeOnDelete();
                
            $table->foreignId('category_mod_id')
                ->constrained('category_mods')
                ->cascadeOnDelete();

            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->string('version', 255)->nullable();
            $table->unsignedTinyInteger('average_rating')->default(0);
            $table->enum('status', ['pending', 'approved', 'rejected']);
            $table->string('rejected_help', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mods');
    }
};
