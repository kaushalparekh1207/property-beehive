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
        Schema::create('pg_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('property_master_id');
            $table->text('pg_name')->nullable();
            $table->string('total_beds', 10)->nullable();
            $table->string('pg_for', 50)->nullable();
            $table->string('best_suited_for', 99)->nullable();
            $table->string('meals_available', 10)->nullable();
            $table->string('meals_offering', 255)->nullable();
            $table->string('meal_speciality', 999)->nullable();
            $table->string('notice_period', 20)->nullable();
            $table->string('lock_in_period', 20)->nullable();
            $table->text('common_areas')->nullable();
            $table->string('non_veg_allowed', 10)->nullable();
            $table->string('opposite_sex_allowed', 10)->nullable();
            $table->string('any_time_allowed', 10)->nullable();
            $table->string('visitors_allowed', 10)->nullable();
            $table->string('guardian_allowed', 10)->nullable();
            $table->string('drinking_allowed', 50)->nullable();
            $table->string('smoking_allowed', 50)->nullable();
            $table->integer('onetime_move_in_charges')->nullable();
            $table->integer('meal_charges_per_month')->nullable();
            $table->integer('electricity_charges_per_month')->nullable();
            $table->string('additional_information', 255)->nullable();
            $table->integer('flag')->default(1)->comment('1=Active, 2=>Inactive');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pg_properties');
    }
};
