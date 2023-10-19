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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('src',100);
            $table->decimal('rating', 5,3);
            $table->string('address',100);
            $table->string('description',100);
            $table->decimal('latitude', 30, 20);
            $table->decimal('longtitude', 30, 20);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
