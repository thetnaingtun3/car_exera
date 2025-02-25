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
        Schema::table('loading_data', function (Blueprint $table) {
            $table->after('date', function ($table) {

//                $table->string('truck_number')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loading_data', function (Blueprint $table) {

            $table->dropColumn('truck_number');
        });
    }
};
