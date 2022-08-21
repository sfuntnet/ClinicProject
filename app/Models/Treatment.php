<?php

namespace App\Models;

use App\Observers\TreatmentObserver as Observer;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'doctor_id',
        'name',
    ];


    public function doctor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public static function boot()
    {
        parent::boot();

        parent::observe(Observer::class);
    }
}
