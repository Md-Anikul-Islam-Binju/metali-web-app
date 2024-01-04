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
        Schema::create('user_post_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_post_comment_id')->constrained('user_post_comments')->onDelete('cascade');
            $table->foreignId('user_id')->constrained();
            $table->text('reply');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_post_replies');
    }
};
