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
        Schema::create('pallet_registers', function (Blueprint $table) {
            $table->id();
            $table->string('pallet_number')->nullable();
            $table->string('product_type')->nullable();
            $table->string('production_line')->nullable();
            $table->string('package')->nullable();
            $table->string('volume')->nullable();
            $table->string('unit')->nullable();
            $table->string('total_amount_per_pallet')->nullable();
            $table->text('qr_code')->nullable();
            $table->timestamp('click_date')->nullable();
            $table->enum('status', ['1', '0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallet_registers');
    }
};
