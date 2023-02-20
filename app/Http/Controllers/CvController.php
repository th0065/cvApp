<?php

namespace App\Http\Controllers;

use App\Models\Cvs;
use App\Models\Metier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cvs = Cvs::latest()->paginate(5);
    
        return view('cv.index',compact('cvs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

   $cvs  = Cvs::where('user_id',Auth::user()->id)
   ->first();
   if ($cvs!=null) {
    return view('cv.show',compact('cvs'));
    
   }else{
       $metier= Metier::all();
       return view('cv.create',compact('metier'));
   }
}
       
       
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'metier_id' => 'required',
            'user_id' => 'required',
            'fileName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($fileName = $request->file('fileName')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $fileName->getClientOriginalExtension();
            $fileName->move($destinationPath, $profileImage);
            $input['fileName'] = "$profileImage";
        }

        Cvs::create($input);

        return redirect()->route('index')
        ->with('success','cv created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show( Request $request)
    {

        
        $cvs  = Cvs::where('user_id',$request->id)
        ->first();
       if ($cvs!=null) {
        return view('cv.show',compact('cvs'));
       }else {
        return redirect()->route('create');
       }
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $cvs=Cvs::find($request->id);
        $metier= Metier::all();
        return view('cv.edit',compact('cvs','metier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'fileName' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $input = $request->all();

        $fileName = $request->file('fileName');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $fileName->getClientOriginalExtension();
            $fileName->move($destinationPath, $profileImage);
            $input['fileName'] = "$profileImage";
            $cvs=Cvs::find($request->id);
            $cvs->update($input);
    
            return redirect()->route('index')
                            ->with('success','cv updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if ($request->id) {
            $cv = Cvs::find($request->id); 
        $cv->delete();
        return redirect()->route('index')
        ->with('success','cv deleted successfully');
        }else {
           
        
            return redirect()->route('index')
            ->with('success','cv not deleted ');
            
        }

       
     
       
    }
}
