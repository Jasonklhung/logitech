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
            preg_match("/(\D{1,2}[???|???]{1})?(\D{1,2}[???|???|???|???]{1})?(.*[???|???]{1})?(.*[???]{1})?(.*[???|???|???]{1})?(.*[???]{1})?(.*[???]{1})?(.*[???]{1})?(.*[???]{1})?([???].*)?(.*[???]{1})?(.*)?/isu",$aaa['addr'],$arr) ;

            $city = preg_replace("/[???|???]/ius", "???", $arr[1]) ;
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
            preg_match("/(\D{1,2}[???|???]{1})?(\D{1,2}[???|???|???|???]{1})?(.*[???|???]{1})?(.*[???]{1})?(.*[???|???|???]{1})?(.*[???]{1})?(.*[???]{1})?(.*[???]{1})?(.*[???]{1})?([???].*)?(.*[???]{1})?(.*)?/isu",$aaa['addr'],$arr) ;

            $city = preg_replace("/[???|???]/ius", "???", $arr[1]) ;
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
