<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    public function subCategories()
    {
        return $this->belongsToMany('App\SubCategory', 'category_has_sub_category');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
