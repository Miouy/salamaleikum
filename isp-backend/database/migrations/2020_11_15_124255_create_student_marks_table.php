<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->id('student_mark_id');
            $table->double('mt_1');
            $table->double('mt_2');
            $table->double('exam');
            $table->double('final');
            $table->string('grade_name');
            $table->double('gpa');
            $table->foreignId('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreignId('discipline_id')->references('discipline_id')->on('disciplines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_marks');
    }
}
