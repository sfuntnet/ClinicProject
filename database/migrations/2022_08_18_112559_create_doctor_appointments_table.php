<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('doctor_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_surname');
            $table->foreignId('doctor_id');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctor_appointments');
    }
}
