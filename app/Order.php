<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['state_id','payment_state_id','users_id','order_id'];
    
    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_has_product');
    }

   
    
}