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
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('province');
            $table->string('municipality');
            $table->string('brgy');
            $table->string('street')->nullable();
            $table->date('birth_date');
            $table->string('religion')->nullable();
            $table->string('citizenship');
            $table->string('marital_status')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('course_code');
            $table->string('high_school')->nullable();
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
        Schema::dropIfExists('student_information');
    }
};
