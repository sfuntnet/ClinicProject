<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor_treatment extends Model
{
    protected $table = 'doctor_treatment';

    protected $fillable = [
        'doctor_id',
        'treatment_id',
    ];
}
