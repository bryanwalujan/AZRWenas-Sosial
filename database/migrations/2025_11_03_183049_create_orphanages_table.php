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
        Schema::create('orphanages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('location');
    $table->integer('child_count');
    $table->text('description');
    $table->string('photo')->nullable(); // path foto
    $table->json('needs'); // contoh: ["beras", "susus", "pampers"]
    $table->json('facilities'); // contoh: ["ruang belajar", "klinik"]
    $table->json('categories'); // contoh: ["yatim", "balita", "disabilitas"]
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphanages');
    }
};
