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
        Schema::create('geographic_details', function (Blueprint $table) {
            $table->id();
            $table->float('latitude', 10, 8);
            $table->float('longitude', 10, 8);
            $table->string('address');
            $table->string('zip_code');
            $table->foreignId('township_id')->constrained();
            $table->foreignId('state_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geographic_details');
    }
};
