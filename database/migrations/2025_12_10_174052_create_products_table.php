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
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            // Informasi utama produk
            $table->string('title');
            $table->string('category');
            $table->integer('price')->nullable();

            // Media & link tambahan
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('sample_link')->nullable();

            // Detail Buku Lengkap
            $table->integer('pages')->nullable();         // jumlah halaman
            $table->string('curriculum')->nullable();     // kurikulum
            $table->string('grade')->nullable();          // jenjang / grade
            $table->string('class')->nullable();          // kelas
            $table->string('group')->nullable();          // golongan
            $table->string('isbn')->nullable();           // ISBN
            $table->date('published_at')->nullable();     // tanggal terbit

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
