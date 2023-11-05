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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 100);
            $table->decimal('price', 3,2);
            $table->text('src');
            $table->timestamps();
            $table->foreignId("restaurant_id")->unsigned();
            $table->foreign('restaurant_id')->references("id")->on("restaurants")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
