<?php

namespace App\Http\Controllers;
use App\Models\food;
use App\User;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Http\Controllers\Controller;
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
       
        $foodSta=food::where('status', food::CONFIRM)->get();
        $best_selling = food::orderBy('total_order', 'desc')->get();
  
        return view('frontend.index')->with('foodSta',$foodSta)->with('best_selling',$best_selling);
    }  
    public function dashboard()
    {  
        $food=food::all();
        $users=User::all();
        $confirmOrders = Order::where('status', Order::CONFIRM)->get();
        $costs = Orderdetails::whereHas('order', function($query) {
            $query->where('status', Order::CONFIRM);
        })->sum('order_details.price');
        // dd($costs);
        return view('admin.dashboard')->with([
            'food' => $food,
            'users' => $users,
            'confirmOrders' => $confirmOrders, 
            'costs' => $costs
        ]);
    }

    
}
