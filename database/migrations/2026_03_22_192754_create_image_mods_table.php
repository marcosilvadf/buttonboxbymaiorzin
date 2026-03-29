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
        Schema::create('image_mods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mod_id')
                ->constrained('mods')
                ->cascadeOnDelete();

            $table->string('link', 255);
            $table->boolean('cover')->default(0);
            $table->string('alt', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_mods');
    }
};
