<?php

namespace App\Http\Controllers;
use App\Models\Foodcategory;
use App\Models\food;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomerouteController extends Controller
{
     public function home()
    {
    	$foodSta=food::where('status', food::CONFIRM)->get();
        // $best_selling=food::all();
        $best_selling = food::orderBy('total_order', 'desc')->get();
        // $best_selling = food::whereHas('id', function($query) {
        //     $query->where('total_order', 'desc');
        // })->get();
        // dd($best_selling);
        $orders = Order::all();
        $foodByCategory=food::groupBy('category_id')->get();
        return view('frontend.index')->with('foodSta',$foodSta)->with('best_selling',$best_selling)->with('orders',$orders)->with('foodByCategory', $foodByCategory);
    }
    public function about()
    {  

        return view('frontend.about');
    }
    // public function home()
    // {
    // 	$foodByCategory=food::groupBy('category_id')->get();
    //     return view('welcome2')->with('foodByCategory', $foodByCategory);
    // }
    public function search(Request $request)
    {
        $search = $request->get('search');
        // $best_selling = food::orderBy('total_order', 'desc')->get();
        $foodSta = food::where('food_name', 'LIKE', '%'. $search. '%')->get();
        return view('frontend.search')->with('foodSta',$foodSta);
    }
    public function myorder()
    {

    }
}
