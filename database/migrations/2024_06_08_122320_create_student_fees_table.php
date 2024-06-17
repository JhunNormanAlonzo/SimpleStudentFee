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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_fee_id');
            $table->string('id_number');
            $table->string('ef_number');
            $table->string('student_name');
            $table->decimal('payable', 8, 2);
            $table->decimal('paid', 8, 2)->default(0.00);
            $table->decimal('balance', 8, 2)->default(0.00);
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('course_fee_id')->references('id')->on('course_fees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
