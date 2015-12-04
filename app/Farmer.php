<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $table = 'farmer';
    protected $primaryKey = 'farmerId';

    public function city_name()
    {
        return $this->hasOne('App\City', 'cityId', 'city');
    }

    public function town_name()
    {
        return $this->hasOne('App\Town', 'townId', 'town');
    }

    public function meta()
    {
        return $this->hasMany('App\FarmerMeta', 'farmerId', 'farmerId');
    }
}
