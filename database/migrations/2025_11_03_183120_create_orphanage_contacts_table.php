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
      Schema::create('orphanage_contacts', function (Blueprint $table) {
    $table->id();
    $table->foreignId('orphanage_id')->constrained()->cascadeOnDelete();
    $table->string('contact_name');
    $table->string('phone');
    $table->string('role'); // contoh: Pengas183
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphanage_contacts');
    }
};
