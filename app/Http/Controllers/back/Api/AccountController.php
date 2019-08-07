<?php

namespace App\Http\Controllers\back\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\AccountRepository;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
    	$this->accountRepository = $accountRepository;
    }

    public function addAccount(Request $request)
    {
    	//dd($request->all());

    	$validator = Validator::make($request->all(),
                    [
                        'aUserName'=>'required',
                        'aAccount'=>'required',
                        'aPassword'=>'required',
                        'aGroup'=>'required',
                    ],
                    [
                        'aUserName.required'=>'請填寫姓名',
                        'aAccount.required'=>'請填寫帳號',
                        'aPassword.required'=>'請填寫密碼',
                        'aGroup.required'=>'請選擇群組',
                    ]);

    	if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$account = $request->aAccount;
        	$password = bcrypt($request->aPassword);
        	$username = $request->aUserName;
        	$group = $request->aGroup;

        	$this->accountRepository
        		->InsertAccount($account,$password,$username,$group);
        }

        return response()->json(['success'=>'success']);
    }

    public function passSecurity(Request $request)
    {
        //更新後台
        // $account =  $this->accountRepository
        //             ->getAccount();

        // foreach ($account as $data ) {
        //     $id = $data['id'];
        //     $password = bcrypt($data['password']);

        //     $this->accountRepository
        //         ->updatepass($id,$password);
        // }

        //更新前台
        $consumer =  $this->accountRepository
                    ->getConsumer();

        foreach ($consumer as $consumer ) {
            $id = $consumer['id'];
            $password = bcrypt($consumer['password']);

            $this->accountRepository
                ->updatepass2($id,$password);
        }
    }
}
