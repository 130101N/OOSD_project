<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','dob','nic','tel','address','email','gender_id'];
}
