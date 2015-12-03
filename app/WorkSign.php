<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkSign extends Model
{
    protected $table = 'worksign';
    protected $primaryKey = 'workSignId';

    public function isSigned($workId, $userId)
    {
        $worksign = WorkSign::where(['workId' => $workId, 'memberId' => $userId])->get();

        if($worksign->isEmpty())
        {
            return False;
        }
        else
        {
            return True;
        }
    }
}
