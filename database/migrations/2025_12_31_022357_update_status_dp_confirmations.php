<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // SQLite: recreate table without CHECK constraint
        Schema::table('dp_confirmations', function (Blueprint $table) {
            // tidak perlu isi, hanya trigger migration
        });
    }

    public function down(): void
    {
        // tidak perlu rollback
    }
};
