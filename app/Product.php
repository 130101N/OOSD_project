<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tittle','description','category_id','sub_category_id','image','price'];

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category');
    }

    public function orders()
    {
         return $this->belongsTo('App\Order', 'order');
    }
}
