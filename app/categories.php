<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    //

protected $fillable= [
    'name','descrip'
];
    public function events()
    {
        return $this->hasMany('App\events','categ_id','id');
    }
}
