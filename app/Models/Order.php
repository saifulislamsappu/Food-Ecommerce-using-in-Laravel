<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 0;
    const CONFIRM = 1;
    protected $table = 'orders';

    protected $fillable = ['name','email','address','city','state','zip','user_id'];

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    // public function product(){
    // 	return $this->belongsToMany('App\Models\food','user_id','id');
    // }
    public function order_details(){
    	return $this->hasMany('App\Models\Orderdetails');
    }

}
