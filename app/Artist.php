<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name','description'];

    protected $hidden = ['created_at'];

    /**
     * [setNameAttribute description]
     * @param [type] $value [description]
     */
    public function setNameAttribute($value){

    	$this->attributes['name'] = ucfirst(strtolower($value));
    }
}
