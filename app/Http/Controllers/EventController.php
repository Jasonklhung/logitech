<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use App\Repositories\ActivitiesRepository;
use Carbon\Carbon;
use Auth;

class EventController extends Controller
{
	protected $eventRepository;
    protected $activitiesRepository;

    public function __construct(EventRepository $eventRepository,ActivitiesRepository $activitiesRepository)
    {
    	$this->eventRepository = $eventRepository;
        $this->activitiesRepository = $activitiesRepository;
    }

    public function event()
    {
        if(Auth::guard('web')->id()){
            $id = Auth::guard('web')->id();
        }
        else{
              $id = '1';
        }
        
    	$today = Carbon::now()->format('Y-m-d');

    	$event = $this->eventRepository
    			->getAllActivity($today);

    	$siders = $this->eventRepository
    			->getSiders($today);

        $city = $this->eventRepository
                ->getcity();

        $zip = $this->eventRepository
                ->getzip($id);

        $css = $this->eventRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

    	return view('logitech/event/event',compact('event','siders','today','city','zip','css','activities'));
    }

    public function eventinfo($id)
    {
        if(Auth::guard('web')->id()){
            $zid = Auth::guard('web')->id();
            
        }
        else{
             $zid = '1';
        }

    	$today = Carbon::now()->format('Y-m-d');

    	$event = $this->eventRepository
    			->getActivity($id);

        $city = $this->eventRepository
                ->getcity();

        $zip = $this->eventRepository
                ->getzip($zid);

        $product = $this->eventRepository
                    ->getProduct($id);

        $store = $this->eventRepository
                ->getStore($id);

        $register = $this->eventRepository
                    ->getConsumerRegister($zid,$id);

        $css = $this->eventRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

        //dd($event);

    	return view('logitech/event/event-info',compact('event','today','city','zip','product','store','register','css','activities'));
    }
}
