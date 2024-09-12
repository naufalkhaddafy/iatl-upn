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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('register_code')->unique();
            $table->string('email')->unique();
            $table->string('nim')->unique()->nullable();
            $table->string('generation')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('domicile')->nullable();
            $table->string('address_now')->nullable();
            $table->foreignId('domicile_id')->nullable()->constrained('regencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('address_now_id')->nullable()->constrained('regencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->string('motto')->nullable();
            $table->string('goal')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('position')->nullable();
            $table->string('password');
            $table->enum('status',['pending','unverified','verified'])->default('unverified');
            $table->boolean('isPremium')->default(false);
            $table->date('premium_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            // $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
