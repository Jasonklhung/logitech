<?php

use Illuminate\Database\Seeder;
use App\Consumer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Consumer();
        $data ->cName = '姜惠珊';
        $data ->cLoginType = 'M';
        $data ->cGender = 'F';
        $data ->cBirthday = '1980-11-06';
        $data ->cMobile = '0919779366';
        $data ->cEmail = 'huishanchiang@gmail.com';
        $data ->password = bcrypt('533533');
        $data ->cAgree = 'Y';
        $data ->cZip = '404';
        $data ->cAddress = '文武街2-10號2樓';
        $data ->cAuthOK = 'Y';
	    $data ->save();

        $data = new Consumer();
        $data ->cName = '吳盈穎';
        $data ->cLoginType = 'M';
        $data ->cGender = 'F';
        $data ->cBirthday = '1983-09-30';
        $data ->cMobile = '0912108585';
        $data ->cEmail = 'lost.koneko@gmail.com';
        $data ->password = bcrypt('000000');
        $data ->cAgree = 'Y';
        $data ->cZip = '114';
        $data ->cAddress = '民權東路六段180巷18號6F-1';
        $data ->cAuthOK = 'Y';
        $data ->save();
    }
}
