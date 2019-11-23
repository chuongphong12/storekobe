<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ['name', 'image', 'description', 'email', 'password', 'phone'];

    public function product_type()
    {
        return $this->belongsTo('App\ProductType', 'id');
    }
    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail', 'id');
    }
}
