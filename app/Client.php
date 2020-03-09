<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'password', 'date_of_birth', 'last_donation_date', 'city_id', 'blood_type_id','pin_code');

    public function blood_type()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function contact()
    {
        return $this->belongsToMany('App\Contact');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Governorate');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }


     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token',
    ];

}
