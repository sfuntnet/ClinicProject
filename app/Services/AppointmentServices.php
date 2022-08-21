<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentServices
{

    private $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function appointmentupdate($request,$id)
    {
        return $this->appointment->appointmentupdate($request,$id);
    }
}
