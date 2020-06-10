<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    use SoftDeletes;

    protected $table = 'orders';

    protected $dates = ['deleted_at'];

    protected $fillable = ['product_id','order_no','customer_name','phone','qty','total','address'];

    public function Product()
    {
        return $this->belongsTo('App\Product');
    }

}
