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
        Schema::create('loading_data', function (Blueprint $table) {
            $table->id();
            $table->string('pallet_number')->nullable();
            $table->string('product_type')->nullable();
            $table->string('production_line')->nullable();
            $table->string('package_type')->nullable();
            $table->string('volume')->nullable();
            $table->string('unit')->nullable();
            $table->string('total')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('car_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loading_data');
    }
};
