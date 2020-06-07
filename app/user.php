<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use Notifiable;


    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adress','role_id','phone','photo_id','user_name','full_name', 'email', 'password','gender','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\role','role_id');
    }

    public function getMyAvatar()
    {
        if(!file_exists(public_path().'/storage'.$this->photo))
        {
            return asset('storage/'.$this->photo);
        }
        else return asset('img/unknown.png');
    }
    public function cart()
    {
        return $this->hasOne('App\ShoppingCart','user_id');
    }
    public function purchases()
    {
        return $this->hasMany('App\purchases','user_id');
    }

}
