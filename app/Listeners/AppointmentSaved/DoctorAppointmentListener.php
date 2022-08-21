<?php

namespace App\Listeners\AppointmentSaved;

use App\Events\AppointmentSavedEvent as Event;
use App\Models\Doctor as Model;


class DoctorAppointmentListener
{
    public function handle(Event $event)
    {
       $model = Model::findorFail($event->model->doctor_id);
       $model->appointment_id = $event->model->id;
       $model->update();
    }
}
