<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;
use App\Repositories\ActivitiesRepository;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Vedio;

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

        $realstore = $this->eventRepository
                ->getrealStore($id);

        $register = $this->eventRepository
                    ->getConsumerRegister($zid,$id);

        $css = $this->eventRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

        //dd($event);

    	return view('logitech/event/event-info',compact('event','today','city','zip','product','store','realstore','register','css','activities'));
    }

    public function video()
    {
        if(Auth::guard('web')->id()){
            $zid = Auth::guard('web')->id();
            
        }
        else{
             $zid = '1';
        }
        
        $today = Carbon::now()->format('Y-m-d');

        $city = $this->eventRepository
                ->getcity();

        $siders = $this->eventRepository
                ->getSiders($today);

        $css = $this->eventRepository
                ->getcss();

        $activities = $this->activitiesRepository
                ->getActivity($today);

        return view('logitech/event/vedio',compact('city','siders','css','activities'));
    }

    public function redirect()
    {

        return Redirect::to('https://bot-event.accunix.net/logitech/fb/pa.php');
    }

    public function redirect2()
    {

        return Redirect::to('https://bot-event.accunix.net/logitech/fb/pa2.php');
    }

    public function FBstore(Request $request)
    {
        $fb = new Vedio;
        $fb->fb_id = $request->fb_uid;
        $fb->fb_name = $request->fb_user;
        $fb->fb_mail = $request->fb_email;
        $fb->save();

        return Redirect::to('https://www.facebook.com/dialog/share?app_id=503275966748258&display=page&href=https://youtu.be/q9zVSWa_DoE&redirect_uri=https://www.logitech-event.com.tw/event/event-info/13/video');
    }

    public function FBstore2(Request $request)
    {
        $fb = new Vedio;
        $fb->fb_id = $request->fb_uid;
        $fb->fb_name = $request->fb_user;
        $fb->fb_mail = $request->fb_email;
        $fb->save();

        return Redirect::to('https://www.facebook.com/dialog/share?app_id=503275966748258&display=page&href=https://youtu.be/ZhK8Lt_2Yz4&redirect_uri=https://www.logitech-event.com.tw/event/event-info/13/video');
    }

    public function fb()
    {

        return view('logitech/event/fb');
    }
}
