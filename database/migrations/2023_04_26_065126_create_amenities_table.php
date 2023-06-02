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
        // Schema::create('amenities', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('amenities', 100);
        //     $table->integer('flag')->default(1)->comment('1=Active, 2=>Inactive');
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenities');
    }
};