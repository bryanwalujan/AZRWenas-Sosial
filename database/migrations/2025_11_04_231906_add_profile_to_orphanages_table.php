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
       Schema::table('orphanages', function (Blueprint $table) {
    $table->text('founded_year')->nullable();
    $table->text('address')->nullable();
    $table->string('phone', 20)->nullable();
    $table->string('email', 100)->nullable();
    $table->text('legal_documents')->nullable();
    $table->text('vision')->nullable();
    $table->text('mission')->nullable();
    $table->json('target_service')->nullable();
    $table->integer('capacity')->nullable();
    $table->integer('in_house_male')->nullable();
    $table->integer('in_house_female')->nullable();
    $table->integer('external_male')->nullable();
    $table->integer('external_female')->nullable();
    $table->string('foundation_name')->nullable();
    $table->text('history')->nullable();
    $table->string('leader_name')->nullable();
    $table->string('leader_phone')->nullable();
    $table->string('secretary_name')->nullable();
    $table->string('secretary_phone')->nullable();
    $table->string('treasurer_name')->nullable();
    $table->string('treasurer_phone')->nullable();
    $table->decimal('land_area', 10, 2)->nullable(); // m²
    $table->string('land_status')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orphanages', function (Blueprint $table) {
            //
        });
    }
};
