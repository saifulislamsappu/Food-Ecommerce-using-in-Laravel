<?php

namespace App\Http\Controllers\Food;
use App\Models\Order;
use App\Models\food;
use App\Models\Orderdetails;
use Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()

    {	
        // $orders=auth()->user()->orders;
    	$orders = Order::all();
    	return view('admin.order-list')->with('orders',$orders);
    }

    public function store (Request $request)

    {
          $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required',
    ],
    [
        'image.required' => 'You have to choose the Image!',
        'category_id.required' => 'You have to choose the Category!',
        'medical_id.required' => 'You have to choose the Medical Term!',

        
    ]);
        // dd(auth()->id());
        $orders = new Order();

       
        // $user_id=Session::get('user_id');
        // echo $user_id;
        $orders->name =$request->input('name');
        $orders->email =$request->input('email');
        $orders->address =$request->input('address');
        $orders->city =$request->input('city');
        $orders->state =$request->input('state');
        $orders->zip =$request->input('zip');
        $orders->user_id = auth()->id();
        $orders->save();

        foreach ( Cart::content() as $key => $item) {
            $orderDetails = Orderdetails::create(['order_id' => $orders->id, 'food_id' => $item->id, 'quantity' => $item->qty, 'price' => $item->price*$item->qty]);
            // $total_order=food::where('id',id)->get();
            // $total_order=update();
        //      $total_order = food::whereHas('id', function($query) {
        //     $query->where('id', order_details::quantity);
        // })->update('food.total_order');
            $food_row=food::find($item->id);
            $total_order_prev=$food_row->total_order;
            $total_income_prev=$food_row->total_income;
            $food_row->update(
                [
                'total_order'=>$total_order_prev+$item->qty,
                'total_income'=>$total_income_prev+ $item->price*$item->qty
                ]
                );
        }

        Cart::destroy();

        // Cart::restored('order_id');
        // Cart::erase('orders');


        return redirect('/')->with('status','Your Order is complete');
    }
    public function view($id)
    {
        $order=Order::with('order_details')->where('id', $id)->first();
        return view('admin.order-view')->with('order',$order);
    }
    public function delete($id)
    {
        $orders = Order::findorfail($id);
        $orders->delete();
        return redirect('/order')->with('status','Order delete Done');
    }
    public function orderStatus(Request $request)
    {
        $orders=Order::find($request->id);  
        $orders->status=$request->status;
        $orders->save();
        return response()->json(['success'=>'action change']);
    }

    
}
