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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('identifier_key');
            $table->string('description');
            $table->string('image_path');
            $table->foreignId('company_type_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('geographic_detail_id')->constrained();
            $table->softDeletes();
            $table->timestamps();
            //$table->foreign('brand_id')->refrences('id')->on('brands');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
