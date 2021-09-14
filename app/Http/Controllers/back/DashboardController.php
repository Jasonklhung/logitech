<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\DashboardRepository;
use Carbon\Carbon;
use App\Activities;
use DB;

class DashboardController extends Controller
{
	protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
    	$this->dashboardRepository = $dashboardRepository;
    }

    public function dashboard()
    {
        $act = Activities::all();

        foreach ($act as $key => $value) {
            
        }

        $month = $value->aStartRegister;
        $today = $value->aEndRegister;

    	// $today = Carbon::now()->format('Y-m-d');
    	// $month = date("Y-m-d", strtotime('-30 day'));


    	$gender = $this->dashboardRepository
    			->getSexConsumerOneMonth($month,$today);

    	$member = $this->dashboardRepository
    			->getNewOldMember($month,$today);

    	$age = $this->dashboardRepository
    			->getAgeMember($month,$today);

    	$area = $this->dashboardRepository
    			->getAreaMember($month,$today);

    	$activity = $this->dashboardRepository
    				->getActivity($month);
    				
    	return view('back.dashboard.dashboard',compact('gender','member','age','area','activity'));
    }

    public function activityInfo($id)
    {
        $getDate = $this->dashboardRepository
                    ->getActivityDetail($id);

        $start = explode(" ",$getDate[0]->aStartDate)[0];
        $end = explode(" ",$getDate[0]->aEndDate)[0];
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

        $activeDate = $this->dashboardRepository
                    ->getRegisterArea($id,$start,$end);

        $logintotal = $this->dashboardRepository
                    ->getloginTotal($start,$end);

        $loginRegister = $this->dashboardRepository
                        ->getloginRegister($id,$start,$end);

        $MaleRegister = $this->dashboardRepository
                        ->getGenderRegister($id,$start,$end);

        $BannerClick = $this->dashboardRepository
                        ->getBannerClick($id,$start,$end);

        $BannerClickMember = $this->dashboardRepository
                        ->getBannerClickMember($id,$start,$end);

        $StoreClick = $this->dashboardRepository
                        ->getStoreClick($id,$start,$end);

        $StoreClickMember = $this->dashboardRepository
                        ->getStoreClickMember($id,$start,$end);

        // $ShareClick = $this->dashboardRepository
        //                 ->getShareClick($id,$start,$end);

                        $ShareClick =  [
                            DB::table('aShareClick')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                            ,
                            DB::table('aShareClick')
                            ->where('ConsumerId','!=','0')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                            ,
                            DB::table('aShareClick')
                            ->where('ConsumerId','=','0')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                            ,
                            DB::table('aShareClick')
                            ->where('type','=','FB')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                            ,
                            DB::table('aShareClick')
                            ->where('type','=','Line')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                            ,
                            DB::table('aShareClick')
                            ->where('type','=','Email')
                            ->where('ActivityId',$id)
                            ->whereBetween('created_at', [$start, $end])
                            ->count()
                        ];


        $registerProduct = $this->dashboardRepository
                        ->getRegisterProduct($id,$start,$end);



        return view('back.dashboard.activity-info',compact('activeDate','logintotal','loginRegister','MaleRegister','BannerClick','BannerClickMember','StoreClick','StoreClickMember','ShareClick','registerProduct'));
    }
}
