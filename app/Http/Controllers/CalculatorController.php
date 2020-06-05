<?php

namespace App\Http\Controllers;
use App\Models\food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculator(Request $request)
    {
    	$food=food::all();
    	return view('frontend.food-suggestion')->with('food',$food);	
    }
}
