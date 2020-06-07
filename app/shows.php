<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shows extends Model
{
    //
    protected $table = 'shows';
    public  function  event()
    {
        return $this->belongsTo('App\events','event_id');
    }

    protected $fillable =
        [
          'event_id','starting_date','ending_date'
        ];
}
