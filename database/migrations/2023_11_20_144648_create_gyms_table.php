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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->decimal('lat', 8, 6)->nullable();
            $table->decimal('lng', 9, 6)->nullable();
            $table->string('cover_image')->nullable();
            $table->string('logo')->nullable();
            $table->integer('subscription_rate')->default(0);
            $table->integer('expected_number_customers')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
