<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    protected $fillable = ['code','name','price','description','picture'];

    public function Order()
    {
        return $this->hasMany('App\Order', 'product_id');
    }
}
