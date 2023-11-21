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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            // Details 
            // $table->string('name');
            $table->string('icon')->nullable();
            // $table->text('description')->nullable();
            $table->integer('visits_no')->nullable();
            $table->string('bg_color')->nullable();
            // Prices 
            $table->double('daily_price');
            $table->double('monthly_price');
            $table->double('quarterly_price');
            $table->double('midterm_price');
            $table->double('annual_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
