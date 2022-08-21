<?php

namespace App\Observers;
use App\Events\DoctorSavedEvent as Event;
use App\Models\Doctor as Model;

class DoctorObserver
{
    public function created(Model $model)
    {
        event(new Event($model));
    }
}
