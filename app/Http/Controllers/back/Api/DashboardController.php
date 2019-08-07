<?php

namespace App\Http\Controllers\back\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\DashboardRepository;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $dashboardRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
    	$this->dashboardRepository = $dashboardRepository;
    }

    public function searchMemberArea(Request $request)
    {
    	$area = $request->area;

    	$today = Carbon::now()->format('Y-m-d');
    	$month = date("Y-m-d", strtotime('-30 day'));

    	if($area == 'north'){
    		return $this->dashboardRepository
    				->NorthMemberArea($month,$today);
    	}
    	else if($area == 'mid'){
    		return $this->dashboardRepository
    				->MidMemberArea($month,$today);
    	}
    	else if($area == 'south'){
    		return $this->dashboardRepository
    				->SouthMemberArea($month,$today);
    	}
    	else if($area == 'east'){
    		return $this->dashboardRepository
    				->EastMemberArea($month,$today);
    	}
    }

    public function dataSearch(Request $request)
    {
    	$start = $request->start;
    	$end = $request->end;
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

    	return $this->dashboardRepository
    				->DashboardDataSearch($start,$end);
    }

    public function activeSearch(Request $request)
    {
    	$start = $request->start;
    	$end = $request->end;
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

    	return $this->dashboardRepository
    				->ActiveSearch($start,$end);
    }

    public function registerPie(Request $request)
    {
        $id = $request->value;

        $getDate = $this->dashboardRepository
                    ->getActivityDetail($id);

        $start = explode(" ",$getDate[0]->aStartDate)[0];
        $end = explode(" ",$getDate[0]->aEndDate)[0];
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

        return $activeDate = $this->dashboardRepository
                    ->getRegisterArea($id,$start,$end);
    }

    public function loginPie(Request $request)
    {
        $id = $request->value;

        $getDate = $this->dashboardRepository
                    ->getActivityDetail($id);

        $start = explode(" ",$getDate[0]->aStartDate)[0];
        $end = explode(" ",$getDate[0]->aEndDate)[0];
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

        $getloginTotal = $this->dashboardRepository
                    ->getloginTotal($start,$end);

        $loginRegister = $this->dashboardRepository
                        ->getloginRegister($id,$start,$end);

        return [$getloginTotal,$loginRegister];
    }

    public function regSearch(Request $request)
    {
        $id = $request->id;
        $start = $request->start;
        $end = $request->end;
        $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));

        return $this->dashboardRepository
                    ->regSearch($id,$start,$end);
    }
}
