<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
//use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

    	$user = new User;
    	$user->cName  = $request->regName;
    	$user->cLoginType  = 'M';
    	$user->cGender  = $request->regGender;
    	$user->cBirthday  = $request->regBirthday;
    	$user->cMobile  = $request->regMobile;
    	$user->cEmail  = $request->regEmail;
    	$user->cZip  = $request->regDistinct;
    	$user->cAddress  = $request->regAddress;
    	$user->cAgree  = 'Y';
    	$user->password = bcrypt($request->regPassword);

    	$user->save();

        $last_id = $user->id;

    	return redirect()->back()->with([
            'register'=>$request->regMobile,
            'id'=>$last_id,
        ]);

    }

    public function file(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'file'=>'required|mimes:pdf',
                'username'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
            ],
            [
                'file.required' => '請上船pdf',
                'username.required'=>'請填寫名稱',
                'username.regex'=>'請遵照規則',
            ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        return response()->json(['success'=>'Record is successfully added']);
    }
}
