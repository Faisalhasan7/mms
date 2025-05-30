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
        Schema::create('product_buys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->string('product_name');
            $table->string('price');
            $table->string('quantity');
            $table->string('sub_total')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('year');
            $table->string('month');
            $table->string('date');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_buys');
    }
};
