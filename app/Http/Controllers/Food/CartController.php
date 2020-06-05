<?php

namespace App\Http\Controllers\Food;

use App\Models\food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.add-cart');
    }

    public function store(Request $request)
    {
    	// dd($request->id);
        // $food=food::findOrFail($request->id);
    	// dd($food);

        // Cart::add($id,$food->food_name,1,$food->price,['img'=>$food->image]);

        \Cart::add($request->id,$request->food_name,1,$request->price, 0, ['img' => $request->image]);

        // dd(Cart::content());
        return redirect('/cart')->with('status','Item  Added Done');
        
    }

    public function updateQuantity(Request $request)
    {
    	
        $qty=$request->qty;
        $rowId=$request->rowId;
        Cart::update($rowId,$qty);


        return redirect('/cart')->with('status','Item  Added Done');
    }
     public function delete($id)

    {
        \Cart::remove($id);
        return back()->with('status','Item Delete Done');
    }

}
