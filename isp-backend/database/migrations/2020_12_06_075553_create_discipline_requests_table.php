<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplineRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_requests', function (Blueprint $table) {
            $table->id('discipline_request_id');
            $table->foreignId('student_request_id')->references('student_request_id')->on('student_requests')->onDelete('cascade');
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
        Schema::dropIfExists('discipline_requests');
    }
}
