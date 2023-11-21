<?php

use App\Models\Gym;
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
        Schema::create('gym_times', function (Blueprint $table) {
            $table->id();
            $table->time('Saturday')->nullable();
            $table->time('Sunday')->nullable();
            $table->time('Monday')->nullable();
            $table->time('Tuesday')->nullable();
            $table->time('Wednesday')->nullable();
            $table->time('Thursday')->nullable();
            $table->time('Friday')->nullable();
            $table->integer('shift')->default(1);
            $table->enum('type',['open','closed']);
            $table->foreignIdFor(Gym::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_times');
    }
};
