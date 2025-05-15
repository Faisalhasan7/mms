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
        Schema::table('staff', function (Blueprint $table) {
            //
            $table->string('staff_joining_date')->nullable();
            $table->string('image')->nullable();
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('facebook_account')->nullable();
            $table->string('father_name');
            $table->string('father_mobile');
            $table->string('village');
            $table->string('holding_no')->nullable();
            $table->string('post');
            $table->string('thana');
            $table->string('district');
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid_pic')->nullable();
            $table->string('nearest_relative_dhaka')->nullable();
            $table->string('nearest_relative_mobile')->nullable();
            $table->string('nearest_relative_house_no')->nullable();
            $table->string('nearest_relative_road_no')->nullable();
            $table->string('nearest_relative_area')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('section')->nullable();
            $table->string('subject')->nullable();
            $table->string('id_no')->nullable();
            $table->string('job_post')->nullable();
            $table->string('rent')->default(0);
            $table->string('advance')->default(0);
            $table->string('service')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
};
