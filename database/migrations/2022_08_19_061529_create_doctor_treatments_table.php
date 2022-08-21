<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::create('doctor_treatment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id');
            $table->foreignId('doctor_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctor_treatments');
    }
}
