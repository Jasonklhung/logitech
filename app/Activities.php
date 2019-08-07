<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $table = 'aActivities';

    public $timestamps = false;

    public function ActivityMeta()
    {
        return $this->hasOne('App\ActivityMeta','aActivity');
    }	
    
}
