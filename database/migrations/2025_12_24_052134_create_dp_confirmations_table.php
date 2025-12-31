<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dp_confirmations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->decimal('total_amount', 12, 2);
            $table->decimal('dp_amount', 12, 2);

            // ✅ GANTI ENUM → STRING
            $table->string('status')->default('pending');

            $table->text('note')->nullable();
            $table->string('payment_proof')->nullable();
            $table->enum('payment_type', ['dp', 'full'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dp_confirmations');
    }
};
