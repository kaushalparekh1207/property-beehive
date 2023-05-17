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
        Schema::create('industrial_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('property_master_id');
            $table->text('descr');
            $table->string('land_zone',99)->nullable();
            $table->string('total_floor',10)->nullable();
            $table->string('is_main_road_facing', 10)->nullable();
            $table->string('floor_allowed_for_construction', 50)->nullable();
            $table->string('total_open_side', 50)->nullable();
            $table->string('width_of_road_facing_plot',10)->nullable();
            $table->string('any_construction',10)->nullable();
            $table->string('boundary_wall_made',10)->nullable();
            $table->string('carpet_area', 50)->nullable();
            $table->string('super_area', 50)->nullable();
            $table->string('plot_area', 50)->nullable();
            $table->string('plot_length', 50)->nullable();
            $table->string('plot_breadth', 50)->nullable();
            $table->string('furnished_status', 99)->nullable();
            $table->string('possession_status', 50)->nullable();
            $table->string('age', 50)->nullable();
            $table->string('time_duration', 99)->nullable();
            $table->string('currently_leased_out', 50)->nullable();
            $table->string('leased_to',50)->nullable();
            $table->string('monthly_rent',10)->nullable();
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
        Schema::dropIfExists('industrial_properties');
    }
};
