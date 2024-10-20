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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->foreignId('seat_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_model_id')->constrained()->onDelete('cascade');
            $table->year('year');
            $table->integer('doors')->default(0);
            $table->string('color',100);
            $table->string('fuel_type', 40)->nullable();
            $table->integer('mileage')->default(0);
            $table->string('transmission', 40)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price',18,8)->default(0);
            $table->json('images')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->timestamps();

            $table->index('status');
            $table->index('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
