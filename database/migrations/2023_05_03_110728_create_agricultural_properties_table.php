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
        Schema::create('agricultural_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('property_master_id');
            $table->text('descr');
            $table->string('total_floor',10)->nullable();
            $table->string('total_bedrooms',10)->nullable();
            $table->string('total_bathrooms',10)->nullable();
            $table->string('total_open_side', 50)->nullable();
            $table->string('width_of_road_facing_plot',10)->nullable();
            $table->string('boundary_wall_made',10)->nullable();
            $table->string('is_in_gated_colony',10)->nullable();
            $table->string('carpet_area', 50)->nullable();
            $table->string('super_area', 50)->nullable();
            $table->string('width_of_entrance', 50)->nullable();
            $table->string('plot_area', 50)->nullable();
            $table->string('plot_length', 50)->nullable();
            $table->string('plot_breadth', 50)->nullable();
            $table->string('furnished_status', 99)->nullable();
            $table->string('possession_status', 50)->nullable();
            $table->string('age', 50)->nullable();
            $table->string('time_duration', 99)->nullable();
            $table->string('currently_leased_out', 50)->nullable();
            $table->string('cover_image', 255)->nullable();
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
        Schema::dropIfExists('agricultural_properties');
    }
};
