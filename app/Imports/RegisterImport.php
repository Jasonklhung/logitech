<?php

namespace App\Imports;

use App\Register;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class RegisterImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Register([
           'rActivity'     => $row[0],
           'rConsumer'    => $row[1], 
           'rProduct' => $row[2], 
           'rHolds' => $row[3], 
           'rQRCode' => $row[4], 
           'rQRConfirm' => $row[5], 
           'rSend' => $row[6], 
           'rUsed' => $row[7], 
           'rUTM' => $row[8], 
           'rNetNumber' => $row[9], 
           'rInvoiceNo' => $row[10], 
           'rInvoiceImage' => $row[11], 
           'rStore' => $row[12], 
           'rStatus' => $row[13], 
           'rCreateDateTime' => $row[14],
           'rLastModify' => $row[15],
        ]);
    }
}
