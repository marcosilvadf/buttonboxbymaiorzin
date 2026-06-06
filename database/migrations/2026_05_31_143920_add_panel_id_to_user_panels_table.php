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
        Schema::table('user_panels', function (Blueprint $table) {                        
            $table->foreignId('panel_id')
                ->after('user_id')
                ->constrained('panels')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_panels', function (Blueprint $table) {
            $table->dropConstrainedForeignId('panel_id');
        });
    }
};
