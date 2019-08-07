<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AwardRepository;
use App\Repositories\ActivitiesRepository;
use Carbon\Carbon;
use Auth;

class AwardController extends Controller
{
    protected $awardRepository;
    protected $activitiesRepository;

    public function __construct(AwardRepository $awardRepository,ActivitiesRepository $activitiesRepository)
    {
    	$this->awardRepository = $awardRepository;
        $this->activitiesRepository = $activitiesRepository;
    }

    public function award()
    {
       // dd(url()->full());

        if(Auth::guard('web')->id()){
            $id = Auth::guard('web')->id();
            
        }
        else{
             $id = '1';
        }
        
    	$today = Carbon::now()->format('Y-m-d');

    	$award = $this->awardRepository
    			->getendActivity($today);

    	$siders = $this->awardRepository
    			->getSiders($today);

        $city = $this->awardRepository
                ->getcity();

        $zip = $this->awardRepository
                ->getzip($id);

        $css = $this->awardRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

    	return view('logitech/award/award',compact('award','siders','city','zip','css','activities'));
    }
}
