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
        // Cars Table
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key for cars (default is `id`)
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->decimal('price', 10, 2);
            $table->year('year');
            $table->integer('mileage');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('ssn')->unique();

            // Purchase Information
            $table->timestamp('purchase_date_time')->nullable();
            $table->foreignId('purchased_by_user_id')->nullable()->constrained('users', 'id')->nullOnDelete();

            // Feedback Information
            $table->text('comment')->nullable();
            $table->timestamp('comment_date_time')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });


        // Discounts Table
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); // Primary key for discounts (default is `id`)
            $table->string('code')->unique();
            $table->decimal('percentage', 5, 2);
            $table->timestamp('starting_time')->nullable();
            $table->timestamp('ending_time')->nullable();

            // Foreign key for the car
            $table->foreignId('car_id')
                ->constrained('cars') // Default references `cars.id` because we're using Laravel's default id column
                ->cascadeOnDelete(); // Delete discount if the associated car is deleted

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('cars');
    }
};
