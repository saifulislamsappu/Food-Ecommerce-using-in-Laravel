<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id','food_id','quantity','price'];

    public function product(){
    	return $this->belongsTo('App\Models\food','food_id','id');
    }

    public function order() {
    	return $this->belongsTo('App\Models\Order');
    }

}
