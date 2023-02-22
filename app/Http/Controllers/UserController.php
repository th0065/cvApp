<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Validator;
use App\Models\RoleUser;
use App\Models\Emplois;
use App\Models\Demande;
use App\Models\Metier;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function emploi(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'metier_id' => 'required',
            'lieu' => 'required',
            'nom' => 'required',
            'details' => 'required',
        ]);
        if ($request->logo) {
            $logo = $request->file('logo');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $profileImage);
            $input['logo'] = '$profileImage';
        }
       
        $input = $request->all();
        if ( Emplois::create($input)) {
            return redirect()->back()->with('error',"enregistrement éffectué");
          /*  $role=RoleUser::where('user_id',Auth::user()->id)->first();
            $emploi=Emplois::where('user_id',Auth::user()->id)->first();
            return view('home',compact('role','emploi'));*/
        }
      else {

       return redirect()->back()->with('error',"enregistrement échoué");
      }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function role()
    {
        $role=RoleUser::where('user_id',Auth::user()->id)->first();
        return view('role.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required',
        ]);
        $input = $request->all();

        $role=RoleUser::where('user_id',Auth::user()->id )->first();
        if($role!=null){
            $role->update($input);
          

        }else {
            RoleUser::create($input); 
          

        }
      
      return redirect('home');;
      
    }

    /**
     * Display the specified resource.
     */
    public function emploiCreate(Request $request)
    {
        $role=RoleUser::where('user_id',Auth::user()->id )->first();
      $metier=Metier::all();
        return view('emploi.create',compact('role','metier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editEmploi(Request $request)
    {
        $role=RoleUser::where('user_id',Auth::user()->id )->first();
        $emploi=Emplois::find($request->id);
        $metier=Metier::all();
        return view('emploi.create',compact('emploi','role','metier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateEmploi(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'metier_id' => 'required', 
        ]);
        if ($request->logo) {
            $logo = $request->file('logo');
            $destinationPath = 'images/';
            $profileImage = ''.date('YmdHis') . '.' . $logo->getClientOriginalExtension().'';
            $logo->move($destinationPath, $profileImage);
            $input['logo'] = $profileImage;
        }
        $input = $request->all();
        $emploi=Emplois::find($request->id);
        $emploi->update($input);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delEmploi(Request $request): RedirectResponse
    {
        if ($request->id) {
            $emploi = Emplois::find($request->id); 
        $emploi->delete();
        return redirect('home');
        }else {
           
        
            return redirect()->back();
            
        }
    }

    public function postuleEmploi(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'emploi_id' => 'required',
            'cvs_id' => 'required', 
        ]);
        $input = $request->all();

       
            if(Demande::create($input)){
                return redirect()->back()->with('success', 'Enregistrement reussi');
            } else {
                return redirect()->back()->with('error', 'Enregistrement non abouti');
            }
          

       
      
       
    }

    public function demandes( Request $request)
    {

        
        $demande  = Demande::where('user_id',$request->id)
        ->get();
       if ($demande==null) {
        return redirect()->back()->with('message',"vous n'avez postulé à aucun emploi!!!");
       }else {
       
        return view('emploi.demande',compact('demande'));
       }
      
    }

    public function delDemande(Request $request)
    {
        if ($request->id) {
            $demande = Demande::find($request->id); 
        $demande ->delete();
        return redirect()->back()->with('success','demande supprimée!!!');
       
        }else {
           
        
            return redirect()->back()->with('error','demande non supprimée!!!');
            
        }

       
    }

    public function postulants( Request $request)
    {

        
        $postulants  = Demande::where('emploi_id',$request->id)
        ->get();
       if ($postulants==null) {
        return redirect()->back()->with('message',"vous n'avez de postulants !!!");
       }else {
       
        return view('emploi.demande',compact('postulants'));
       }
      
    }

}
