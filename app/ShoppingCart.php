<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    //
    protected $table = 'shopping_carts';
    protected $fillable =
        [
            'user_id'
        ];
    public function ticketsInCart()
    {
        return $this->belongsToMany('App\tickets','cart_ticket','cart_id','ticket_id')->withPivot('id','show_id','status','quantity')->wherePivot('status',"unconfirmed");
    }


}
