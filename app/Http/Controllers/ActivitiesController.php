<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activities;
use App\Repositories\ActivitiesRepository;
use Carbon\Carbon;
use Auth;

class ActivitiesController extends Controller
{
    protected $activitiesRepository;

    public function __construct(ActivitiesRepository $activitiesRepository)
    {
    	$this->activitiesRepository = $activitiesRepository;
    }

    public function index()
    {
        if(Auth::guard('web')->id() == ''){
            $id = '1';
        }
        else{
             $id = Auth::guard('web')->id();
        }

    	$today = Carbon::now()->format('Y-m-d');

    	$activities = $this->activitiesRepository
    			->getActivity($today);

    	$siders = $this->activitiesRepository
    			->getSiders($today);

        $city = $this->activitiesRepository
                ->getcity();

        $zip = $this->activitiesRepository
                ->getzip($id);

        $css = $this->activitiesRepository
                ->getcss();

    	return view('logitech/index',compact('activities','siders','city','zip','css'));
    }
}
