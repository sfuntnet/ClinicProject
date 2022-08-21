<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
