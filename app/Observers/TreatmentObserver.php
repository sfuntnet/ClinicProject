<?php

namespace App\Observers;
use App\Events\TreatmentSavedEvent as Event;
use App\Models\Treatment as Model;


class TreatmentObserver
{
    public function created(Model $model)
    {
       event(new Event($model));
    }
}
