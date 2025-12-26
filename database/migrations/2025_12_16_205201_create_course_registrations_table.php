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
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('course_id');
            $table->string('email');
            $table->string('first_name'); 
            $table->string('last_name');
            $table->string('phone_number');
            // Foreign key constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unique(['course_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
