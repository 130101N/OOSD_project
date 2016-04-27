<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Privilage extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'privilage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_has_privilage');
    }
   
}