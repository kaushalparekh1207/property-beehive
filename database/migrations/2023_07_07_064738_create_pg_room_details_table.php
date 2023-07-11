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
        Schema::create('pg_room_details', function (Blueprint $table) {
            $table->id();
            $table->integer('pg_id');
            $table->string('room_type', 50)->nullable();
            $table->integer('total_beds_in_room')->nullable();
            $table->integer('rent');
            $table->integer('security_deposit');
            $table->text('facilities')->nullable();
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
        Schema::dropIfExists('pg_room_details');
    }
};
