<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CategoryHasSubCat extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_has_sub_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','sub_category_id'];
}
