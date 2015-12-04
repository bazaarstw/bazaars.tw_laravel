<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'storeId';

    public function meta()
    {
        return $this->hasMany('App\StoreMeta', 'storeId', 'storeId');
    }
}
