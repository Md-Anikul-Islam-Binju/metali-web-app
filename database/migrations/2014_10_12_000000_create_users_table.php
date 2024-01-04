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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('relation_status')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('profile_photo')->nullable();
            $table->text('short_bio')->nullable();
            $table->string('political_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('status')->default(1);
            $table->string('email')->unique()->nullable();
            $table->string('role')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
