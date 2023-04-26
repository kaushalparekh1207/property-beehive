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
        Schema::create('property_masters', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->integer('property_type_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('locality', 99);
            $table->string('name_of_project', 99);
            $table->text('spectification');
            $table->text('address');
            $table->integer('total_hall');
            $table->integer('total_kitchen');
            $table->integer('total_bedrooms');
            $table->integer('total_balconies');
            $table->integer('total_bathrooms');
            $table->integer('total_floor');
            $table->string('furnished_status', 50);
            $table->string('floor_allowed_for_construction', 50)->nullable();
            $table->string('total_open_side', 50)->nullable();
            $table->string('width_of_road_facing_plot', 50)->nullable();
            $table->string('carpet_area', 50)->nullable();
            $table->string('super_area', 50)->nullable();
            $table->string('possession_status', 50);
            $table->string('age', 50);
            $table->string('time_duration', 99);
            $table->string('khata_certificate', 99)->nullable();
            $table->string('deed_certificate', 99)->nullable();
            $table->string('occupancy_certificate', 99)->nullable();
            $table->string('maintenance', 99)->nullable();
            $table->string('monthly_charge', 99)->nullable();
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
        Schema::dropIfExists('property_masters');
    }
};
