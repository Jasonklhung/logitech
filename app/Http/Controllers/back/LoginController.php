<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

	use AuthenticatesUsers;

    // protected $guard = 'admin';
    

    // protected $redirectTo = '/backstage/login';


    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }

	public function show()
	{
		return view('back.login');
	}

    public function login(Request $request)
    {
        $account = $request->account;
        $password = $request->password;

        if (Auth::guard('admin')->attempt(array('aAccount' => $account, 'password' => $password))){


           return redirect()->route('dashboard');
       }
       else{
       		return back()->with('error','帳號密碼錯誤');
       }

    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	 return redirect()->to('/backstage/login');
    }
}
