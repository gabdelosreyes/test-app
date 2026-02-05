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
            $table->string('cvsu_email')->nullable();
            $table->timestamps();

            $table->foreign('student_number')->references('student_number')->on('student_profiles')->onDelete('cascade');
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
