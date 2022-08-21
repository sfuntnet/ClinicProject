<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('appointment_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('image_url');
            $table->string('path_name');
            $table->timestamps();
            $table->timestamp('deleted_at', 6)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
