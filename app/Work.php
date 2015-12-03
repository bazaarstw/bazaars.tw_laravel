<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'work';
    protected $primaryKey = 'workId';

    public function city_name()
    {
        return $this->hasOne('App\City', 'cityId', 'city');
    }

    public function town_name()
    {
        return $this->hasOne('App\Town', 'townId', 'town');
    }

    public function user()
    {
        return $this->hasOne('App\Member', 'memberId', 'memberId');
    }

    public function attendees()
    {
        return $this->hasMany('App\WorkSign', 'workId', 'workId');
    }

    public function recently()
    {
        return Work::whereRaw('endDT >= now()')->orderBy('startDT')->get();
    }
}
