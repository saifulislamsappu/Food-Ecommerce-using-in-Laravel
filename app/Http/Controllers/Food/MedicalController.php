<?php

namespace App\Http\Controllers\Food;

use App\Models\food;
use App\Models\Medical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()

    {
    	$medical=Medical::all();
    	return view('admin.medical-term-list')->with('medical',$medical);
    }

    public function create()

    {
    	return view('admin.medical-create');
    }

    public function store(Request $request)
    {
    	 $validatedData = $request->validate([
        'term_name' => 'required',        
    ]);
    	$medical = new Medical();
    	$medical->term_name =$request->input('term_name');
    	$medical->save();

    	return redirect('/medical-term')->with('status','Medical term Create Done');	
    }

    public function edit($id)
    {
    	$medical = Medical:: findorfail($id);
    	return view('admin.medical-term-edit')->with('medical',$medical);
    }

    public function update(Request $request, $id)
    {
         $validatedData = $request->validate([
        'term_name' => 'required',        
    ]);
    	$medical = Medical:: findorfail($id);
    	$medical->term_name = $request->input('term_name');
    	$medical->update();
    	return redirect('/medical-term')->with('status','Medical term Update Done');
    }

    public function delete($id)
    {
    	$medical = Medical:: findorfail($id);
    	$medical->delete();
    	return redirect('/medical-term')->with('status','Medical term delete Done');
    }

    public function changedStatus(Request $request)
    {
        $medical=Medical::find($request->id);  
        $medical->status=$request->status;
        $medical->save();
        return response()->json(['success'=>'action change']);
    }
}
