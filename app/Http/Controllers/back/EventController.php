<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\EventRepository;
use Carbon\Carbon;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
    	$this->eventRepository = $eventRepository;
    }

    public function event()
    {
    	//dd(auth()->guard('admin')->user());

		$today = Carbon::now()->format('Y-m-d');

    	$event = $this->eventRepository
    			->getAllActivity();

    	return view('back/event/event',compact('today','event'));
    }

    public function eventinfo($id)
    {
    	$event = $this->eventRepository
    			->getActivity($id);

    	$pro = $this->eventRepository
    			->getProduct();

    	$city = $this->eventRepository
    			->getstorecity();

        $actProduct = $this->eventRepository
                    ->getActivityProduct($id);

        $actStore = $this->eventRepository
                    ->getActivityStore($id);

    	return view('back/event/event-info',compact('event','pro','city','actProduct','actStore'));
    }

    public function eventadd()
    {

    	$pro = $this->eventRepository
    			->getProduct();

    	$city = $this->eventRepository
    			->getstorecity();

    	return view('back/event/event-add',compact('pro','city'));
    }
}
