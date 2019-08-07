<?php

use Illuminate\Database\Seeder;
use App\Account;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Account();
        $data ->aAccount = 'accuhit';
        $data->password = bcrypt('accuhit');
        $data ->aUserName = '測試';
        $data ->aGroup = 'A';
	    $data ->save();
    }
}
