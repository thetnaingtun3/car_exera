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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('teacher_id');

            $table->string('title');
            $table->string('slug_title')->nullable();
            $table->string('product_code')->nullable();

            $table->string('image')->nullable();
            $table->string('intro_thumbnail')->nullable();
            $table->string('intro_video')->nullable();

            $table->longText('outline')->nullable();
            $table->longText('about_program')->nullable();
            $table->longText('who_attend')->nullable();

            $table->string('price')->nullable();
            $table->string('extend_price')->nullable();
            $table->integer('discount')->nullable();
            $table->string('original_price')->nullable();

            $table->integer('rank')->nullable();
            $table->enum('type', ['free', 'premium', 'comingsoon'])->default('premium');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->boolean('assignment')->default(false);

            $table->timestamps();
            // Add foreign key constraints
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
