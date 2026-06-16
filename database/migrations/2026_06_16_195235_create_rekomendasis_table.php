<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('rekomendasi', function (Blueprint $table) {
        $table->id();             // ID otomatis
        $table->string('judul');   // Kolom judul
        $table->text('deskripsi'); // Kolom deskripsi
        $table->string('link');    // Kolom link
        $table->timestamps();      // Menambah kolom created_at & updated_at
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasis');
    }
};
