<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained();
            $table->string('title')->nullable();
            $table->integer('rank')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('feedback', ['active', 'inactive'])->default('inactive');
            $table->string('group_type')->nullable();
            $table->enum('premium_type', ['free', 'premium'])->default('premium');
            $table->enum('type', ['normal_chapter', 'end_chapter'])->default('normal_chapter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
