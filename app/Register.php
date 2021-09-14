<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'aRegister';

    protected $fillable = ['rActivity','rConsumer','rProduct','rHolds','rQRCode','rQRConfirm','rSend','rUsed','rUTM','rNetNumber','rInvoiceNo','rInvoiceImage','rStore','rData','rStatus','rCreateDateTime'];

    public $timestamps = false;
}
