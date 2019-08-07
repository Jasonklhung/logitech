<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\AccountRepository;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
    	$this->accountRepository = $accountRepository;
    }

    public function accountInfo()
    {
    	$account = $this->accountRepository
    				->getAccountInfo();

    	return view('back.account.account',compact('account'));
    }
}
