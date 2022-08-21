<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctor_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('doctor_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_doctor');
    }
}
