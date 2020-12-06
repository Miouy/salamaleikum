<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id('discipline_id');
            $table->string('discipline_name');
            $table->integer('discipline_credit');
            $table->string('discipline_code');
            $table->string('discipline_type');
            $table->string('discipline_teacher');
            $table->boolean('discipline_is_elective');
            $table->boolean('discipline_is_finished');
            $table->foreignId('semester_id')->references('semester_id')->on('semesters')->onDelete('cascade');
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
        Schema::dropIfExists('disciplines');
    }
}
