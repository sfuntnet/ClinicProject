<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \App\Events\DoctorSavedEvent::class => [
            \App\Listeners\DoctorSaved\UserDoctorListener::class,
        ],

        \App\Events\AppointmentSavedEvent::class => [
            \App\Listeners\AppointmentSaved\DoctorAppointmentListener::class,
        ],

        \App\Events\TreatmentSavedEvent::class => [
            \App\Listeners\TreatmentSaved\DoctorTreatmentListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
