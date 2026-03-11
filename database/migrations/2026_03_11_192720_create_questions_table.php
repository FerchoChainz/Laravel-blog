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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            // A question belongs to a category, so we need to create a foreign key to the categories table
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            // A question belongs to a user, so we need to create a foreign key to the users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // create a field title and description, title will be used to display the question in the frontend and description will be used to display the question in the frontend
            $table->string('title');
            $table->text('description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
