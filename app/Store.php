<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'storeId';

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
        return $this->hasMany('App\StoreMeta', 'storeId', 'storeId');
    }
}
