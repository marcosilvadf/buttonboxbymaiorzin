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
        Schema::create('pc_hash_trials', function (Blueprint $table) {
            $table->id();
            $table->string('first_ip', 255);
            $table->string('updated_ip', 255);
            $table->string('pc_hash', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc_hash_trials');
    }
};
