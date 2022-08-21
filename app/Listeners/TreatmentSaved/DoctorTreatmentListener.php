<?php

namespace App\Listeners\TreatmentSaved;

use App\Events\TreatmentSavedEvent as Event;
use App\Models\Doctor_Treatment as Model;

class DoctorTreatmentListener
{

    public function handle(Event $event)
    {
        $model = new Model;
        $model->doctor_id = $event->model->doctor_id;
        $model->treatment_id = $event->model->id;
        $model->save();
    }
}
