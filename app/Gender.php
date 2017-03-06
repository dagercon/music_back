<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    
    protected $fillable = ['name'];

    protected $hidden = ['created_at'];

    /**
     * [setNameAttribute description]
     * @param [type] $value [description]
     */
    public function setNameAttribute($value){

    	$this->attributes['name'] = ucfirst(strtolower($value));
    }
}
