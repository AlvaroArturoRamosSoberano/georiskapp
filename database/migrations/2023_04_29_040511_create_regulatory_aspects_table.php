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
        Schema::create('regulatory_aspects', function (Blueprint $table) {
            $table->id();
            $table->boolean('conservation_program');
            $table->boolean('gas_production');
            $table->boolean('emergency_plan');
            $table->integer('explosiveness');
            $table->foreignId('license_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulatory_aspects');
    }
};
