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
            $table->date('delivery_date')->nullable();
            $table->string('delivery_order_number')->nullable();
            $table->string('lsp_name')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('truck_type')->nullable();
            $table->string('truck_driver_name')->nullable();
            $table->string('product_type')->nullable();
            $table->string('volume')->nullable();
            $table->string('production_line')->nullable();
            $table->string('pallet_number')->nullable();
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
