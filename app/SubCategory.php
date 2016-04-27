<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type','description','image'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_has_sub_category');
    }
}
