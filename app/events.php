<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    //
protected $fillable =
    [
        'id','name','descrip','venue','categ_id','photo_id','status','photo'
    ];
    public function scopePublishedEvents($query)
    {
        return $query->where('status','published');
    }
    public function tickets()
    {
        return $this->hasMany('App\tickets','event_id');
    }
    public function getPhoto()
    {
        if(!file_exists(public_path().'/storage'.$this->photo))
        {
            return asset('storage/'.$this->photo);
        }
        else return asset('img/unknown.png');
    }
    public function category()
    {
        return $this->belongsTo('App\categories','categ_id');
    }
    public function shows()
    {
        return $this->hasMany('App\shows','event_id');
    }


}
