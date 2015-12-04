<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'memberId';

    public function works()
    {
        return $this->belongsTo('App\Work', 'memberId', 'memberId');
    }
}
