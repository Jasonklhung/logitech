<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MemberRepository;
use App\Repositories\RegisterRepository;
use App\Repositories\ActivitiesRepository;
use Carbon\Carbon;
use Auth;

class MemberController extends Controller
{
    protected $memberRepository;
    protected $registerRepository;
    protected $activitiesRepository;

    public function __construct(MemberRepository $memberRepository, RegisterRepository $registerRepository,ActivitiesRepository $activitiesRepository)
    {
    	$this->memberRepository = $memberRepository;
        $this->registerRepository = $registerRepository;
        $this->activitiesRepository = $activitiesRepository;
    }

    public function memberlogin()
    {
        $today = Carbon::now()->format('Y-m-d');

        $siders = $this->memberRepository
                ->getSiders($today);

        $city = $this->memberRepository
                ->getcity();

        $css = $this->memberRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

        return view('logitech/member/member-login',compact('siders','city','css','activities'));
    }

    public function member()
    {
        $id = Auth::guard('web')->id();

        $today = Carbon::now()->format('Y-m-d');

    	$siders = $this->memberRepository
    			->getSiders($today);

        $city = $this->memberRepository
                ->getcity();

        $zip = $this->memberRepository
                ->getzip($id);

        $activity = $this->memberRepository
                    ->memberActivity($id);

        $css = $this->memberRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

    	return view('logitech/member/member',compact('today','siders','city','zip','activity','css','activities'));
    }

    public function editinfo(Request $request)
    {
        $aaa = $request->all();
        $id = Auth::guard('web')->id();

        if(count($aaa) == '2' && isset($aaa['email'])){
            $email = $this->memberRepository
                    ->updateEmail($id,$aaa['email']);

            return back();
        }
        else if(count($aaa) == '2' && isset($aaa['addr'])){

            $arr = array();
            preg_match("/(\D{1,2}[縣|市]{1})?(\D{1,2}[鄉|鎮|市|區]{1})?(.*[村|里]{1})?(.*[鄰]{1})?(.*[路|街|道]{1})?(.*[段]{1})?(.*[巷]{1})?(.*[弄]{1})?(.*[號]{1})?([之].*)?(.*[樓]{1})?(.*)?/isu",$aaa['addr'],$arr) ;

            $city = preg_replace("/[臺|台]/ius", "台", $arr[1]) ;
            $area = $arr[2];
            $addr = $arr[3].$arr[4].$arr[5].$arr[6].$arr[7].$arr[8].$arr[9].$arr[10].$arr[11].$arr[12];

            $zip = $this->memberRepository
                 ->addressMatchzip($city,$area);

            $zip = $zip[0]->zZip;

            $address = $this->memberRepository
                        ->updateAddr($id,$zip,$addr);

            return back();

       }
        else if(count($aaa) == '3'){
            
            $arr = array();
            preg_match("/(\D{1,2}[縣|市]{1})?(\D{1,2}[鄉|鎮|市|區]{1})?(.*[村|里]{1})?(.*[鄰]{1})?(.*[路|街|道]{1})?(.*[段]{1})?(.*[巷]{1})?(.*[弄]{1})?(.*[號]{1})?([之].*)?(.*[樓]{1})?(.*)?/isu",$aaa['addr'],$arr) ;

            $city = preg_replace("/[臺|台]/ius", "台", $arr[1]) ;
            $area = $arr[2];
            $addr = $arr[3].$arr[4].$arr[5].$arr[6].$arr[7].$arr[8].$arr[9].$arr[10].$arr[11].$arr[12];

            $zip = $this->memberRepository
                 ->addressMatchzip($city,$area);

            $zip = $zip[0]->zZip;

            $all = $this->memberRepository
                        ->updateAll($id,$aaa['email'],$zip,$addr);

            return back();
        }
        else{
            return back();
        }
    }
}
