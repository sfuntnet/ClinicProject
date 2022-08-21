<?php

namespace App\Models;

use App\Http\Resources\DoctorResource;
use App\Observers\DoctorObserver as Observer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'treatment_id',
        'appointment_id',
        'user_id',
    ];


    public function appointment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor_appointment(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Doctor_appointment::class, 'doctor_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function treatment(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Treatment::class);
    }


    public function index()
    {
        return DoctorResource::collection(Doctor::with('treatment', 'appointment')->get());
    }

    public function indexDoctor()
    {
        return DoctorResource::collection(Doctor::get());
    }

    public function show($id)
    {
        return Doctor::findOrFail($id)->first();
    }

    public function store($request)
    {
        $name = $request->file('image')->getClientOriginalName();

        $imageName = time() . '.' . $request->image->extension();

        $path = $request->image->move('img', $imageName);

        $save = new Doctor;

        $save->path_name = $name;
        $save->image_url = $path;
        $save->name = $request->name;
        $save->user_id = $request->user_id;

        $save->save();

        return redirect('/');
    }

    public function updateDoctor($request)
    {
        $treatments = new Treatment();
        $treatments->doctor_id = $request->name;
        $treatments->name = $request->treatment;
        $treatments->save();


        $appointment = new Appointment();
        $appointment->doctor_id = $request->name;
        $appointment->date = $request->date;
        $appointment->finish_date = $request->finishdate;
        $appointment->save();

        return redirect('/');
    }

    public function edit($id)
    {
        return Doctor::with('appointment')->where('id', $id)->first();
    }

    public function destroydoctor($id)
    {
        $model = Doctor::findOrFail($id);
        $model->delete();

        return redirect('/');
    }

    public function appointmentActive($id)
    {
        Doctor::withTrashed()->findOrFail($id)->restore();

        return redirect('/');
    }

    public static function boot()
    {
        parent::boot();

        parent::observe(Observer::class);
    }
}
