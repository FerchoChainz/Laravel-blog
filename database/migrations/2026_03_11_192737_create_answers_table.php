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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            // An answer belongs to a question, so we need to create a foreign key to the questions table
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            // An answer belongs to a user, so we need to create a foreign key to the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade   ');

            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
