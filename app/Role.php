<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    public function privilages()
    {
        return $this->belongsToMany('App\Privilage', 'role_has_privilage');
    }
    
}