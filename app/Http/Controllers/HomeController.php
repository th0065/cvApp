<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
use App\Models\Emplois;
use App\Models\Cvs;
use App\Models\Metier;


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
    public function index(Request $request)
    {
        if ($request->search) {
            $emplois=Emplois::where('nom',$request->search)->get();
        }
        if ($request->category) {
           
                $emplois=Emplois::where('metier_id',$request->category)->get();
            
           
        }
        
        if ($request->category==null && $request->search==null) {
            $emplois=Emplois::all();
        }
        $role=RoleUser::where('user_id', Auth::user()->id)->first();
        $emploi=Emplois::where('user_id', Auth::user()->id)->get();
        
        $cvs=Cvs::where('user_id', Auth::user()->id)->first();
        $metier=Metier::all();
        return view('home' ,compact('role','emploi','emplois','cvs','metier'));
    }
}
