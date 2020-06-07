<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $table = 'roles';
    public function users()
    {
        return $this->hasMany('App\user','role_id');
    }
}
