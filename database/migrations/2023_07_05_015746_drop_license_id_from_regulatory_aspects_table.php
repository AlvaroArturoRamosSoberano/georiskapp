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
        Schema::table('regulatory_aspects', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('license_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regulatory_aspects', function (Blueprint $table) {
            //
            $table->foreignId('license_id')->constrained();
        });
    }
};
