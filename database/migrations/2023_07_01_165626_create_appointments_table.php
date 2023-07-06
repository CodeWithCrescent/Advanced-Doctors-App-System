<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->string('appointment_num')->nullable();
            $table->string('reference_num')->unique()->nullable();
            $table->foreignId('client_id')->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('session_id')->constrained()->references('session_id')->on('sessions')->onDelete('cascade');
            $table->integer('status');
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
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['session_id']);;
        });
        Schema::dropIfExists('appointments');
    }
}
