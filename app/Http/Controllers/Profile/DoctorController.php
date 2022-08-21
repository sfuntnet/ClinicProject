<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorAddRequest;
use App\Models\Doctor;
use App\Services\AppointmentServices;
use App\Services\DoctorServices;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorservices;
    private $appointmentservices;

    public function __construct(DoctorServices $doctorservices, AppointmentServices $appointmentservices)
    {
        $this->doctorservices = $doctorservices;
        $this->appointmentservices = $appointmentservices;
    }

    public function index()
    {
        $model = $this->doctorservices->indexDoctor();

        return view('add-appointment', [
            'model' => $model,
        ]);

    }

    public function create()
    {
        $this->middleware('auth');

        return view('add-doctor');
    }

    public function store(DoctorAddRequest $request)
    {
        return $this->doctorservices->store($request);
    }

    public function doctorUpdate(Request $request)
    {
        return $this->doctorservices->updateDoctor($request);
    }

    public function edit($id)
    {
        $model = $this->doctorservices->edit($id);

        if ($model->appointment != null) {
            return view('edit', [
                'model' => $model,
            ]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        return $this->appointmentservices->appointmentupdate($request, $id);
    }

    public function destroy($id)
    {
        return $this->doctorservices->destroy($id);
    }

    public function appointmentActive($id)
    {
        return $this->doctorservices->appointmentActive($id);
    }
}
