<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = false;
    protected $fillable = array('name');

    public function governorate()
    {
        return $this->belongsTo('App\Governorate');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\DonationRequest');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

}