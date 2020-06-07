<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    //
    protected $table = 'purchases';

    protected $primaryKey = 'id';


    public function ticket()
    {
        return $this->hasOne('App\tickets','id','ticket_id');
    }
    public function show()
    {
        return $this->hasOne('App\shows','id','show_id');
    }
    public function user()
    {
        return $this->hasOne('App\user','id','user_id');
    }

}
