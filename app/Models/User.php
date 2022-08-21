<?php

namespace App\Models;

use App\Http\Resources\DoctorResource;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;
use Yajra\DataTables\Facades\DataTables;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Doctor::class)->withTrashed();
    }


    public function getDoctor()
    {
        return DoctorResource::collection(User::with('doctor')->get());
    }

    public function login($request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($user->id)->plainTextToken;

        return response()->json([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ], 200);
    }
}
