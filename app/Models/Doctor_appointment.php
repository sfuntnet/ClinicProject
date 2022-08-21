<?php

namespace App\Models;

use App\Http\Resources\AppointmentResource;
use App\Http\Resources\DoctorAppointmentResource;
use Illuminate\Database\Eloquent\Model;

class Doctor_appointment extends Model
{
    protected $fillable = [
        'date',
        'clients_name',
        'doctor_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];


    public function doctor(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Doctor::class, 'id', 'doctor_id');
    }


    public function appointmentcreate()
    {
        return DoctorAppointmentResource::collection(Doctor_appointment::with('doctor')->get());
    }

    public function appointmentstore($request, $id)
    {

        $model = new Doctor_appointment;
        $model->client_name = $request->name;
        $model->client_surname = $request->surname;
        $model->doctor_id = $id;
        $model->date = $request->date;
        $model->save();

        return redirect('/');
    }

}
