<?php

namespace App\Http\Controllers\Food;

use App\Models\Foodcategory;
use App\Models\food;
use App\Models\Medical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function food()
    {
    	$foods = food::with('order_details')->get();

    	return view('admin.foodlist')->with('foods', $foods);
    }

    public function foodup()
    {
        $categories = Foodcategory::all();
        $medical=Medical::all();
        return view('admin.food-create')->with('categories',$categories)->with('medical',$medical);
    }

    public function foodstore(Request $request)

    {
        $validatedData = $request->validate([
        'food_name' => 'required',
        'protein' => 'required',
        'fat' => 'required',
        'carbohydrate' => 'required',
        'KCal' => 'required',
        'Price' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|not_in:0',
        'medical_id' => 'required|not_in:0',
    ],
    [
        'image.required' => 'You have to choose the Image!',
        'category_id.required' => 'You have to choose the Category!',
        'medical_id.required' => 'You have to choose the Medical Term!',

        
    ]);
    
        $image=time().'.'.$request->image->getClientOriginalExtension();

        $success= $request->image->move(('assets/images/foods'),$image);

        $food = new food();
        $food->food_name =$request->input('food_name');
        $food->protein =$request->input('protein');
        $food->fat =$request->input('fat');
        $food->carbohydrate =$request->input('carbohydrate');
        $food->KCal =$request->input('KCal');
        $food->Price =$request->input('Price');
        $food->image =$image;
        $food->category_id =$request->category_id;
        $food->medical_id =$request->medical_id;
        $food->save();

        return redirect('/food')->with('status','Food Create Done'); 
    }


    public function foodedit($id)
    {
        
        $categories = Foodcategory::all();   
        $food = food:: findorfail($id);
        $medical=Medical::all();
        return view('admin.food-edit')->with('food',$food)->with('categories',$categories)->with('medical',$medical);
    }

    public function foodupdate(Request $request, $id)

    {
        $validatedData = $request->validate([
        'food_name' => 'required',
        'protein' => 'required',
        'fat' => 'required',
        'carbohydrate' => 'required',
        'KCal' => 'required',
        'Price' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|not_in:0',
        'medical_id' => 'required|not_in:0',
    ],
    [
        'image.required' => 'You have to choose the Image!',
        'category_id.required' => 'You have to choose the Category!',
        'medical_id.required' => 'You have to choose the Medical Term!',

        
    ]);

        $image=time().'.'.$request->image->getClientOriginalExtension();

        $success= $request->image->move(('assets/images/foods'),$image);

        $food = food:: findorfail($id);
        $food->food_name = $request->input('food_name');
        $food->protein = $request->input('protein');
        $food->fat = $request->input('fat');
        $food->carbohydrate = $request->input('carbohydrate');
        $food->KCal = $request->input('KCal');
        $food->Price = $request->input('Price');
        $food->image =$image;
        $food->category_id =$request->category_id;
        $food->medical_id =$request->medical_id;
        $food->update();
        return redirect('/food')->with('status','Food Update Done');
    }

    public function fooddelete($id)

    {
        $food = food:: findorfail($id);
        $food->delete();
        return redirect('/food')->with('status','food Delete Done');
    }

    public function foodchangeStatus(Request $request)
    {
        $food=food::find($request->id);  
        $food->status=$request->status;
        $food->save();
        return response()->json(['success'=>'action change']);
    }

    public function foodcategories()

    {
    	$categories=Foodcategory::all();
    	return view('admin.food-categories')->with('categories',$categories);
    }

    public function foodcategoriescreate()

    {
    	return view('admin.categories-create');
    }

    public function foodcategoriesstore(Request $request)
    {
        $validatedData = $request->validate([
        'categories_name' => 'required',   
    ]);
    	$categories = new Foodcategory();
    	$categories->categories_name =$request->input('categories_name');
    	$categories->save();

    	Session::flash('statuscode','success');
    	return redirect('/food-categories')->with('status','Category Create Done');	
    }

    public function foodcategoriesedit($id)
    {
    	$categories = Foodcategory:: findorfail($id);
    	return view('admin.categories-edit')->with('categories',$categories);
    }

    public function foodcategoriesupdate(Request $request, $id)
    {
        $validatedData = $request->validate([
        'categories_name' => 'required',   
    ]);
    	$categories = Foodcategory:: findorfail($id);
    	$categories->categories_name = $request->input('categories_name');
    	$categories->update();
    	return redirect('/food-categories')->with('status','Category Update Done');
    }

    public function foodcategoriesdelete($id)
    {
    	$categories = Foodcategory:: findorfail($id);
    	$categories->delete();
    	return redirect('/food-categories')->with('status','Category delete Done');
    }

    public function categorieschangeStatus(Request $request)
    {
        $categories=Foodcategory::find($request->id);  
        $categories->status=$request->status;
        $categories->save();
        return response()->json(['success'=>'action change']);
    }

    public function order($id)
    {
        $food=food::find($id);
        return view('frontend.order-view')->with('food',$food);
    }
    
    // public function cart($id)
    // {
    //     $food=food::find($id);
    //     return view('frontend.add-cart')->with('food',$food);
    // }
}
