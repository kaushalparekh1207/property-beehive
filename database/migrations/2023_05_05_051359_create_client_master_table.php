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
        Schema::create('client_master', function (Blueprint $table) {
            $table->id();
            $table->integer('client_type_id');
            $table->string('name',50)->nullable();
            $table->string('contact',11);
            $table->string('email',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('zip',50)->nullable();
            $table->text('address')->nullable();
            $table->string('user_password',100);
            $table->string('password',100);
            $table->integer('flag')->default(1)->comment('1=Active, 2=>Inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_master');
    }
};
