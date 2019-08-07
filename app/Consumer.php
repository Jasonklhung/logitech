<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    protected $table = 'aConsumer';

    public $timestamps = false;

    public function zip()
    {
        return $this->hasOne('App\Ziparea','zZip','cZip');
    }
}
