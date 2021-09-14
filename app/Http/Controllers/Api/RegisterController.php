<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\User;

class RegisterController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
    	$this->eventRepository = $eventRepository;
    }

    public function selArea(Request $request)
    {
    	$city = $request->regCity;

    	$area = $this->eventRepository
    			->getArea($city);

    	return $area;
    }

    public function Authcode(Request $request)
    {
        $reMobile = $request->cTel;
        $id = $request->id;
        $msg = mt_rand(1000,9999);

        $authcode = $this->eventRepository
                ->updateAuthcode($id,$msg);

        $msg = urlencode('羅技活動驗證碼:'.$msg) ;

        $platform = 'logitechEvents';
        
        
        $code = hash('sha256', 'accuhit:sms:'.$reMobile.':'.$platform) ;
        $url = 'http://sms.accunix.net:9080/api/fet-msg.php?&code='.$code.'&mobile='.$reMobile.'&message='.$msg.'&platform='.$platform.'' ;
        $json = file_get_contents($url);

        $arr = json_decode($json, true) ;
        
        if ($arr['sStatus'] == 'Y'){
            return  ('OK');
        }
        else{
             return ('NG') ;
        }
    }

    public function ResendAuthcode(Request $request)
    {
        $id = $request->id;
        $reMobile = $request->cTel;
        $msg = mt_rand(1000,9999);

        $authcode = $this->eventRepository
                ->updateResendAuthcode($id,$msg);

        $msg = urlencode('羅技活動驗證碼 : '.$msg) ;

        $platform = 'logitechEvents';
        
        
        $code = hash('sha256', 'accuhit:sms:'.$reMobile.':'.$platform) ;
        $url = 'http://sms.accunix.net:9080/api/fet-msg.php?&code='.$code.'&mobile='.$reMobile.'&message='.$msg.'&platform='.$platform.'' ;
        $json = file_get_contents($url);

        $arr = json_decode($json, true) ;

        if ($arr['sStatus'] == 'Y'){
            return  ('OK');
        }
        else{
             return ('NG') ;
        }
    }

    public function authCheck(Request $request)
    {
        $id = $request->id;
        $code = $request->code;

        $consumer = $this->eventRepository
                ->getConsumer($id);

        $authcode = $consumer[0]->cAuthCode;

        if($authcode == $code){

           $consumer = $this->eventRepository
           ->updateAuthOK($id);

            return 'OK';
        }
        else{
            return 'NG';
        }
    }

    public function sendPass(Request $request)
    {
        $reMobile = $request->phone;

        $user = User::where('cMobile',$reMobile)->get();

        if($user->isEmpty()){

            return ('此手機尚未被註冊,請重新填寫');
        }
        else{

            $msg = mt_rand(100000,999999);

            User::where('cMobile',$reMobile)->update(['password' => bcrypt($msg)]);

            $msg = urlencode('這是您的新密碼 : '.$msg.',請使用新密碼登入後,立即前往會員專區修改密碼!') ;

            $platform = 'logitechEvents';


            $code = hash('sha256', 'accuhit:sms:'.$reMobile.':'.$platform) ;
            $url = 'http://sms.accunix.net:9080/api/fet-msg.php?&code='.$code.'&mobile='.$reMobile.'&message='.$msg.'&platform='.$platform.'' ;
            $json = file_get_contents($url);

            $arr = json_decode($json, true) ;

            if ($arr['sStatus'] == 'Y'){
                return  ('OK');
            }
            else{
               return ('NG') ;
           }
        }
    }
}
