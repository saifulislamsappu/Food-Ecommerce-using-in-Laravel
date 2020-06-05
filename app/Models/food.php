<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
	const PENDING = 0;
    const CONFIRM = 1;

    protected $table = 'food';

    protected $fillable = ['food_name', 'image', 'total_order', 'total_income', 'protein', 'fat', 'carbohydrate', 'KCal', 'Price', 'category_id', 'medical_id'];

    public function categoryname(){
    	return $this->belongsTo('App\Models\Foodcategory', 'category_id', 'id');
    }

    public function termname(){
    	return $this->belongsTo('App\Models\Medical', 'medical_id', 'id');
    }

	public function order_details(){
    	return $this->hasMany('App\Models\Orderdetails', 'food_id', 'id');
    }    
}
