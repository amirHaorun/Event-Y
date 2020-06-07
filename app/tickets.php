<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    //
    protected $table='tickets';

    protected $fillable=[
        'type','event_id','descrip','price','available_tickets'
    ];
    public function event()
    {
        return $this->belongsTo('App\events','event_id');
    }



}
