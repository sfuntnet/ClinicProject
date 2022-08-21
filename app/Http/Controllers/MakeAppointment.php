<?php

namespace App\Http\Controllers;

use App\Services\DoctorappointmentService;
use App\Services\DoctorServices;
use Illuminate\Http\Request;

class MakeAppointment extends Controller
{
    private $appointmentservice;
    private $doctorServices;

    public function __construct(DoctorappointmentService $appointmentservice, DoctorServices $doctorServices)
    {
        $this->appointmentservice = $appointmentservice;
        $this->doctorServices = $doctorServices;
    }

    public function index()
    {
        $model = $this->doctorServices->index();

        return view('make-appointment', [
            'model' => $model,
        ]);
    }

    public function create(Request $request)
    {
        $model = $this->appointmentservice->appointmentcreate();

        return view('appointments', [
            'model' => $model,
        ]);
    }

    public function show($id)
    {
        $model = $this->doctorServices->show($id);

        return view('show-appointment', [
            'model' => $model,
        ]);
    }

    public function store(Request $request, $id)
    {
        return $this->appointmentservice->appointmentstore($request, $id);
    }
}
