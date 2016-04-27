<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_has_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_id','product_id','quantity','category_id','subcategory_id','description'];

}