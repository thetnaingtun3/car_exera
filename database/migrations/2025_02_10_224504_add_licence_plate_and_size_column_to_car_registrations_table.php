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
        Schema::table('car_registrations', function (Blueprint $table) {
            $table->string('licence_plate')->nullable();
            $table->string('size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_registrations', function (Blueprint $table) {
            $table->dropColumn('licence_plate');
            $table->dropColumn('size');
        });
    }
};
