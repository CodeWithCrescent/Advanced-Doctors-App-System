<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doctor_id');
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('speciality_id')->constrained()->references('speciality_id')->on('specialities')->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->references('department_id')->on('departments')->onDelete('cascade');
            $table->foreignId('office_id')->constrained()->references('office_id')->on('offices')->onDelete('cascade');
            // $table->string('initial')->nullable();
            $table->string('employee_no')->nullable();
            $table->string('registered_by');
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
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['speciality_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['office_id']);
        });
        Schema::dropIfExists('doctors');
    }
}
