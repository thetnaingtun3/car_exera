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

            $table->after('delivery_date', function ($table) {

                $table->string('date')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loading_data', function (Blueprint $table) {
            //
            $table->dropColumn('date');
        });
    }
};
