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
        Schema::create('inventories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('orphanage_id')->constrained()->cascadeOnDelete();
    $table->string('location'); // Ruangan: Kantor, Aula, dll
    $table->string('item_name');
    $table->string('quantity'); // 3 UNIT, 2 BUAH, dll
    $table->string('source'); // Sumbangan, Dibeli, dll
    $table->decimal('value', 15, 0)->nullable(); // Rp
    $table->text('note')->nullable();
    $table->enum('condition', ['baik', 'rusak'])->default('baik');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
