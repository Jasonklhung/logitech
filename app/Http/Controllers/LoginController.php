<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{   

    public function show()
    {
      return redirect()->route('index');
    }

    public function login(Request $request) //modal login
    {
        $username = $request->cMobile;
        $password = $request->password;


        if (Auth::guard('web')->attempt(array('cMobile' => $username, 'password' => $password))){ 

           return redirect()->route('index');
       }
       else{
       		return back()->with('error','帳號密碼錯誤');
       }

    }
    
    public function memberlogin(Request $request) //member-login使用
    {
        $username = $request->cMobile;
        $password = $request->password;

        if (Auth::guard('web')->attempt(array('cMobile' => $username, 'password' => $password))){ 

           return redirect()->route('index');
       }
       else{
       		return back()->with('error2','帳號密碼錯誤');
       }

    }

    public function eventlogin(Request $request) //event-info login使用
    {
        $username = $request->cMobile;
        $password = $request->password;

        if (Auth::guard('web')->attempt(array('cMobile' => $username, 'password' => $password))){ 

           return back()->with('success-eventinfo','event-info登入');
       }
       else{
          return back()->with('error_event','帳號密碼錯誤');
       }

    }

    public function logout()
    {
    	Auth::guard('web')->logout();
    	return back();
    }

    public function qrcode()
    {
      return view('auth.qrcode');
    }
}
