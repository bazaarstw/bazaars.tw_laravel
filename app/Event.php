<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'newsId';

    public function city_name()
    {
        return $this->hasOne('App\City', 'cityId', 'city');
    }

    public function town_name()
    {
        return $this->hasOne('App\Town', 'townId', 'town');
    }

    public function recently()
    {
        return Event::whereRaw('endDT >= now()')->orderBy('startDT')->get();
    }
}
