<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dp_confirmations', function (Blueprint $table) {
            // ubah status jadi string panjang
            $table->string('status', 50)->default('pending')->change();
        });
    }

    public function down(): void
    {
        Schema::table('dp_confirmations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed'])->default('pending')->change();
        });
    }
};
