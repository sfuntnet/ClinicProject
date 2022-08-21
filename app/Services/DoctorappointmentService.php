<?php

namespace App\Services;

use App\Models\Doctor_appointment;

class DoctorappointmentService
{
    private $appointment;

    public function __construct(Doctor_appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function appointmentstore($request, $id)
    {
        return $this->appointment->appointmentstore($request, $id);
    }

    public function appointmentcreate()
    {

        return $this->appointment->appointmentcreate();
    }

}
