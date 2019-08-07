<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ziparea extends Model
{
    protected $table = 'aZiparea';

    public function consumer()
    {
        return $this->belongsTo('App\Consumer', 'cZip','zZip');
    }
}
