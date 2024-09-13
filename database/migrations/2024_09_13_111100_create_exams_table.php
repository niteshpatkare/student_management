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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->string('exam_code');
            $table->string('subject');
            $table->string('teacher');
            $table->string('department');
            $table->string('exam_type');
            $table->date('exam_date');
            $table->string('exam_time');
            $table->string('duration');
            $table->string('location');
            $table->integer('max_marks');
            $table->integer('passing_marks');
            $table->text('instructions')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
