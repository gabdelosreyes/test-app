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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique();
            $table->string('program');
            $table->string('major')->nullable();
            $table->integer('year_level');
            $table->string('semester');
            $table->string('academic_year');
            $table->string('student_type'); // UG, G, PRO
            $table->string('status'); // REG, IREG, LOA
            $table->year('year_admitted');
            $table->string('sem_admitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
