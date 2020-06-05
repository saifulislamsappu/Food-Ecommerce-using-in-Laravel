<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foodcategory extends Model
{
    protected $table = 'categories';
    protected $fillable = ['categories_name','status'];
}
