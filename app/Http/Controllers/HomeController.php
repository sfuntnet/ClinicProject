<?php

namespace App\Http\Controllers;

use App\Queries\CategoryDatatable;
use App\Services\UserService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{

    private $user;

    public function __construct(UserService $user)
    {
        $this->middleware('auth');

        $this->user = $user;
    }

    public function index(Request $request)
    {
        $model = $this->user->getDoctor();

        return view('home', [
            'model' => $model,
        ]);
    }
    public function getData(){
        return $this->user->getData();
    }
}
