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
       Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orphanage_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('gender', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('education_level');
            $table->enum('status', ['YATIM', 'PIATU', 'YATIM PIATU', 'TERLANTAR', 'EKONOMI LEMAH']);
            $table->boolean('in_house')->default(true); // true = dalam panti
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
