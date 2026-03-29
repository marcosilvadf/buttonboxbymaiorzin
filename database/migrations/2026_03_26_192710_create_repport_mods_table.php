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
        Schema::create('repport_mods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            
            $table->foreignId('mod_id')
                ->nullable()
                ->constrained('mods')
                ->nullOnDelete();

            $table->string('message', 255);
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
        Schema::dropIfExists('repport_mods');
    }
};
