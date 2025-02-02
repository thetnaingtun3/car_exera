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
        Schema::create('car_register_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('car_registration_id')->nullable();
            $table->text('product')->nullable();
            $table->text('package')->nullable();
            $table->text('qty')->nullable();
            $table->text('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_register_products');
    }
};
