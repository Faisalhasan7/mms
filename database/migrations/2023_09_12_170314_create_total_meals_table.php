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
        Schema::create('total_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('border_detail_id');
            $table->string('year');
            $table->string('month');
            $table->string('date');
            $table->string('breakfast')->nullable();
            $table->string('lunch')->nullable();
            $table->string('dinner')->nullable();
            $table->timestamps();

            $table->foreign('border_detail_id')->references('id')->on('border_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_meals');
    }
};
