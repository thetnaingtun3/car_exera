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
        Schema::create('car_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lsp_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->string('car_number')->nullable();
            $table->string('cusomter_name')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('type_of_truck')->nullable();
            $table->string('type_of_truck_type')->nullable();
            $table->string('product')->nullable();
            $table->string('package')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('order_number')->nullable();
            $table->text('remark')->nullable();
            $table->text('qr_code')->nullable();
            $table->date('click_date')->nullable();
            $table->enum('status', ['1', '0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_registrations');
    }
};
