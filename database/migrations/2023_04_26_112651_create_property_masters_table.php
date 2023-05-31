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
            $table->integer('client_master_id');
            $table->string('property_status', 10)->nullable();
            $table->integer('property_type_id');
            $table->integer('property_category_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('name_of_project', 99);
            $table->string('locality', 99);
            $table->string('landmark', 99)->nullable();
            $table->text('address');
            $table->integer('expected_price');
            $table->integer('booking_amount')->nullable();
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
        Schema::dropIfExists('property_masters');
    }
};
