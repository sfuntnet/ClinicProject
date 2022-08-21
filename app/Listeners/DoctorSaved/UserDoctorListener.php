<?php

namespace App\Listeners\DoctorSaved;

use App\Events\DoctorSavedEvent as Event;
use App\Models\User_doctor as Model;

class UserDoctorListener
{
    public function handle(Event $event)
    {
       $model = new Model;
       $model->user_id = $event->model->user_id;
       $model->doctor_id = $event->model->id;
       $model->save();
    }

}
