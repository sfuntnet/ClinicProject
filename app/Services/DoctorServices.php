<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorServices
{
    private $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function index()
    {
        return $this->doctor->index();
    }

    public function show($id)
    {
        return $this->doctor->show($id);
    }

    public function appointmentActive($id)
    {
        return $this->doctor->appointmentActive($id);
    }

    public function destroy($id)
    {
        return $this->doctor->destroydoctor($id);
    }

    public function edit($id)
    {
        return $this->doctor->edit($id);
    }

    public function createDoctor($request)
    {
        return $this->doctor->updateDoctor($request);
    }

    public function store($request)
    {
        return $this->doctor->store($request);
    }

    public function indexDoctor()
    {
        return $this->doctor->indexDoctor();
    }
}
