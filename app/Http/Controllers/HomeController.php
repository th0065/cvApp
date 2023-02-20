<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
use App\Models\Emplois;
use App\Models\Cvs;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=RoleUser::where('user_id', Auth::user()->id)->first();
        $emploi=Emplois::where('user_id', Auth::user()->id)->get();
        $emplois=Emplois::all();
        $cvs=Cvs::where('user_id', Auth::user()->id)->first();
        return view('home' ,compact('role','emploi','emplois','cvs'));
    }
}
