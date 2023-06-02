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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('client_master_id');
            $table->integer('property_master_id');
            $table->string('inqury_type', 50);
            $table->string('name', 50);
            $table->string('contact', 20);
            $table->string('email', 100)->nullable();
            $table->integer('flag')->default(1)->comment('1=Active, 2=>Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
