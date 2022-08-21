<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class User_doctor extends Pivot
{
    protected $table = 'doctor_user';

    protected  $fillable = [
        'user_id',
        'doctor_id',
    ];
}
