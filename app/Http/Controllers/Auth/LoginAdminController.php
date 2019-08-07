<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()

    {

        return view('back.login');

    }

    public function login(Request $request)

    {

        

        if(Auth::guard('admin')->attempt(['aAccount' => $request->account, 'password' => $request->password])){

        	 //dd(Auth::guard('admin')->user());

           return redirect()->to('/backstage/dashboard');

        }



        // }

 

        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }

    public function logout()
    {
        Auth::logout();
        
        return redirect()->to('/backstage/login');
    }


}
