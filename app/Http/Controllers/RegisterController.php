<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Repositories\RegisterRepository;
use Auth;
use Hash;
//use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    protected $registerRepository;

    public function __construct(RegisterRepository $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function register(Request $request)
    {
        $users = User::where('cMobile',$request->regMobile)->get();

        if($users->isEmpty()){

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
        else{

           return back()->with([
                'cName'=>$request->regName,
                'cGender'=>$request->regGender,
                'cBirthday'=>$request->regBirthday,
                'cMobile'=>$request->regMobile,
                'cEmail'=>$request->regEmail,
                'cZip'=>$request->regDistinct,
                'cAddress'=>$request->regAddress,
                'cAgree'=>'Y',
            ]);
        }

    }


    public function changePass(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $pass = Auth::guard('web')->user()->password;
        $old = $request->oldpassword;
        $new = $request->newpassword;
        $confirm = $request->confirmpassword;


        if(Hash::check($old,$pass) == false ){

            return response()->json(['errors'=>['舊密碼輸入錯誤']]);
        }
        else if($new != $confirm){

            return response()->json(['errors'=>['密碼輸入不一致']]);
        }
        else{

            $activities = $this->registerRepository
                ->updatePass($id,bcrypt($new));

            return response()->json(['success'=>['密碼修改成功']]);
        }

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
