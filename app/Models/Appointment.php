<?php

namespace App\Models;

use App\Http\Resources\AppointmentResource;
use App\Observers\AppointmentObserver as Observer;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'date',
        'finish_date',
    ];

    protected $casts = [
        'date' => 'date',
        'finish_date' => 'date',
    ];


    public function doctor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Doctor::class);
    }


    public function appointmentupdate($request,$id){
        $model = Appointment::findorFail($id);
        $model->date = $request->date;
        $model->finish_date = $request->finishdate;
        $model->update();

        return redirect('/');
    }

    public static function boot()
    {
        parent::boot();

        parent::observe(Observer::class);
    }
}
