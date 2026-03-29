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
        Schema::create('payment_plan_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->foreignId('user_type_id')
                ->nullable()
                ->constrained('user_type')
                ->nullOnDelete();
            $table->string('mercado_pago_id', 255)->nullable();
            $table->integer('quantity', false, true)->default(0);
            $table->decimal('value', 8, 2, true)->default(0);
            $table->enum('payment_status', [0, 1, 2, 3])->default('0');
            $table->string('payment_status_text', 255)->nullable();
            $table->string('payment_status_details', 255)->nullable();
            $table->json('json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_plan_users');
    }
};
