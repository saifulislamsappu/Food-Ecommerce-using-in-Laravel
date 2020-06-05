<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function register()
	{
		$users=User::all();
		return view('admin.registerlist')->with('users',$users);

	}  
	// public function registerid(Request $request, $id) 
	// {
	// 	$users = User:: findOrFail($id);
	// 	return view('admin.register-edit')->with('users',$users);
	// }

	// public function registerupdate(Request $request, $id) 
	// {
	// 	$users = User::find($id);
	// 	$user->name =$request->input('name');
	// 	$user->usertype =$request->input('usertype');
	// 	$user->update();
	// 	return redirect('/role-Register')->with('status','your data update');
	// } 

	 public function delete(Request $request, $id)
    {
    	$users = User:: findorfail($id);
    	$users->delete();
    	return redirect('/role-Register')->with('status','User delete Done');
    }

    public function userchangeStatus(Request $request)
    {
        $users=User::find($request->id);  
        $users->status=$request->status;
        $users->save();
        return response()->json(['status'=>'action change']);
    }
    public function myorder()
    {
        // $order=Order::with('order_details')->where('id', $id)->first();
		$orders=Order::with('order_details')->where('user_id', auth()->id())->get();
        return view('frontend.my-order')->with('orders',$orders);
    }
    public function view($id)
    {
        $order=Order::with('order_details')->where('id', $id)->first();
        return view('frontend.myorder-view')->with('order',$order);
    }
    public function myprofile()
	{
		// $users=User::all();
		// $order_details = Orderdetails::all();
		return view('frontend.my-profile');

	} 
}
