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
        Schema::create('student_educ_attainments', function (Blueprint $table) {
            $table->id();
            $table->string('student_number');
            $table->string('educational_level');
            $table->string('degree')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('school_name');
            $table->text('school_address');
            $table->string('status');
            $table->year('year_started');
            $table->year('year_ended');
            $table->string('honors')->nullable();
            $table->timestamps();

            $table->foreign('student_number')->references('student_number')->on('student_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_educ_attainments');
    }
};
