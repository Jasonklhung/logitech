<?php

namespace App\Http\Controllers\back\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\EventRepository;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use App\Exports\ActivityExport;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
    	$this->eventRepository = $eventRepository;
    }

    public function addProduct(Request $request)
    {
    	$category = $request->category;
    	$name = $request->name;

    	$productName = $this->eventRepository
    					->addProduct($category,$name);

    	return response()->json(['status'=>'200']);
    }

    public function addStore(Request $request)
    {
    	$city = $request->city;
    	$store = $request->store;

    	$productName = $this->eventRepository
    					->addStore($city,$store);

    	return response()->json(['status'=>'200']);
    }

    public function getProductName(Request $request)
    {
    	$category = $request->category;

    	$productName = $this->eventRepository
    					->getProductName($category);

    	return $productName;
    }

    public function getStoreName(Request $request)
    {
    	$city = $request->city;

    	$storeName = $this->eventRepository
    					->getStoreName($city);

    	return $storeName;
    }

    public function export(Request $request) 
    {

            $id = $request->event_active;
            $start = $request->event_start;
            $end = $request->event_end;
            $end = date("Y-m-d",strtotime("+1 day",strtotime($end)));
            $today = Carbon::now()->format('Ymd');

            return (new ActivityExport)->search($id,$start,$end)->download($today.'_logitech.xlsx');

    }


    public function addEvent(Request $request)
    {
    	//dd($request->all());
    	//dd(implode(",", $request->aProduct));
        if($request->aMode == 'F'){
            $validator = Validator::make($request->all(),
                    [
                        'aTitle'=>'required',
                        'aType'=>'required',
                        'aStartDate'=>'required',
                        'aEndDate'=>'required',
                        'aStartRegister'=>'required',
                        'aEndRegister'=>'required',
                        'EventImage'=>'required|mimes:gif,jpg,jpeg,png',
                        'textarea5'=>'required',
                        'textarea6'=>'required',
                    ],
                    [
                        'aTitle.required'=>'請填寫活動名稱',
                        'aType.required'=>'請填寫活動別稱',
                        'aStartDate.required'=>'請填寫活動起始日期',
                        'aEndDate.required'=>'請填寫活動結束日期',
                        'aStartRegister.required'=>'請填寫活動註冊起始日期',
                        'aEndRegister.required'=>'請填寫活動註冊結束日期',
                        'EventImage.required'=>'請上傳活動圖片',
                        'EventImage.mimes'=>'請上傳正確的圖片格式 Ex:jpg,jpeg,png',
                        'textarea5.required'=>'請填寫活動分享主旨',
                        'textarea6.required'=>'請填寫活動分享描述',
                    ]);
        }
        else{
        	$validator = Validator::make($request->all(),
                        [
                            'aTitle'=>'required',
                            'aType'=>'required',
                            'aStartDate'=>'required',
                            'aEndDate'=>'required',
                            'aStartRegister'=>'required',
                            'aEndRegister'=>'required',
                            'EventImage'=>'required|mimes:gif,jpg,jpeg,png',
                            'textarea1'=>'required',
                            'textarea2'=>'required',
                            'textarea3'=>'required',
                            'textarea4'=>'required',
                            'textarea5'=>'required',
                            'textarea6'=>'required',
                        ],
                        [
                            'aTitle.required'=>'請填寫活動名稱',
                            'aType.required'=>'請填寫活動別稱',
                            'aStartDate.required'=>'請填寫活動起始日期',
                            'aEndDate.required'=>'請填寫活動結束日期',
                            'aStartRegister.required'=>'請填寫活動註冊起始日期',
                            'aEndRegister.required'=>'請填寫活動註冊結束日期',
                            'EventImage.required'=>'請上傳活動圖片',
                            'EventImage.mimes'=>'請上傳正確的圖片格式 Ex:jpg,jpeg,png',
                            'textarea1.required'=>'請填寫備註說明',
                            'textarea2.required'=>'請填寫活動說明及辦法',
                            'textarea3.required'=>'請填寫注意事項',
                            'textarea4.required'=>'請填寫得獎公告',
                            'textarea5.required'=>'請填寫活動分享主旨',
                            'textarea6.required'=>'請填寫活動分享描述',
                        ]);
        }

    	if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else{
            if ($request->hasFile('EventImage'))
            {

            	$filename = $request->file('EventImage')->getClientOriginalName();
            	$request->file('EventImage')->storeAs('/media/event',$filename,'public_uploads');

            	$upload = '/media/event/'.$filename;

            	$aTitle = $request->aTitle;
            	$aType = $request->aType;

            	$aStartDate = $request->aStartDate;
            	$aEndDate = $request->aEndDate;
            	$aStartRegister = $request->aStartRegister;
            	$aEndRegister = $request->aEndRegister;
            	$aMode = $request->aMode;
            	$FBUrl = $request->FBUrl;
            	$aInvoice = $request->receipt;
            	$aRules = $request->textarea2;
            	$aCautions = $request->textarea3;
            	$aMemo = $request->textarea1;

            	$this->eventRepository
            			->InsertEvent($aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$upload,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo);

            	$id = DB::getPdo()->lastInsertId();

                if($request->aProduct){
                    foreach ($request->aProduct as $aProduct) {
                        $this->eventRepository
                                ->InsertActProduct($id,$aProduct);
                    }
                }
                else{
                    $aProduct = 'NULL';
                }
                if($request->aStore){
                    foreach ($request->aStore as $aStore) {
                        $this->eventRepository
                                ->InsertActStore($id,$aStore);
                    }
                }
                else{
                    $aStore = 'NULL';
                }


            	$aAward = $request->textarea4;

                $this->eventRepository
                        ->InsertAward($id,$aAward);

                $aSubject = $request->textarea5;
            	$aDescription = $request->textarea6;

                $this->eventRepository
                        ->InsertActivityMeta($id,$aTitle,$aDescription,$aSubject,$upload);

            }
            return response()->json(['success'=>'success']);
        }
    }

    public function editEvent(Request $request)
    {
        //dd($request->all());

        if ($request->hasFile('aImage'))
        {
            $filename = $request->file('aImage')->getClientOriginalName();
            $request->file('aImage')->storeAs('/media/event',$filename,'public_uploads');

            $upload = '/media/event/'.$filename;

            $aId = $request->aId;
            $aTitle = $request->aTitle;
            $aType = $request->aType;

            $aStartDate = $request->aStartDate;
            $aEndDate = $request->aEndDate;
            $aStartRegister = $request->aStartRegister;
            $aEndRegister = $request->aEndRegister;
            $aMode = $request->aMode;
            $FBUrl = $request->FBUrl;
            $aInvoice = $request->receipt;
            $aRules = $request->textarea2;
            $aCautions = $request->textarea3;
            $aMemo = $request->textarea1;

            $this->eventRepository
            ->UpdateEvent($aId,$aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$upload,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo);

            if($request->aProduct){

                $this->eventRepository
                    ->DelActProduct($aId);

                foreach ($request->aProduct as $aProduct) {
                    $this->eventRepository
                    ->InsertActProduct($aId,$aProduct);
                }
            }
            else{
                $aProduct = 'NULL';
            }
            if($request->aStore){

                $this->eventRepository
                    ->DelActStore($aId);

                foreach ($request->aStore as $aStore) {
                    $this->eventRepository
                    ->InsertActStore($aId,$aStore);
                }
            }
            else{
                $aStore = 'NULL';
            }


            $aAward = $request->textarea4;

            $this->eventRepository
            ->UpdateAward($aId,$aAward);

            $aSubject = $request->textarea5;
            $aDescription = $request->textarea6;

            $this->eventRepository
            ->UpdateActivityMeta($aId,$aTitle,$aDescription,$aSubject,$upload);

        }
        else{

            $aId = $request->aId;
            $aTitle = $request->aTitle;
            $aType = $request->aType;

            $aStartDate = $request->aStartDate;
            $aEndDate = $request->aEndDate;
            $aStartRegister = $request->aStartRegister;
            $aEndRegister = $request->aEndRegister;
            $aMode = $request->aMode;
            $FBUrl = $request->FBUrl;
            $aInvoice = $request->receipt;
            $aRules = $request->textarea2;
            $aCautions = $request->textarea3;
            $aMemo = $request->textarea1;

            $this->eventRepository
            ->UpdateEventNoImage($aId,$aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo);

            if($request->aProduct){

                $this->eventRepository
                    ->DelActProduct($aId);

                foreach ($request->aProduct as $aProduct) {
                    $this->eventRepository
                    ->InsertActProduct($aId,$aProduct);
                }
            }
            else{
                $aProduct = 'NULL';
            }
            if($request->aStore){

                $this->eventRepository
                    ->DelActStore($aId);

                foreach ($request->aStore as $aStore) {
                    $this->eventRepository
                    ->InsertActStore($aId,$aStore);
                }
            }
            else{
                $aStore = 'NULL';
            }


            $aAward = $request->textarea4;

            $this->eventRepository
            ->UpdateAward($aId,$aAward);

            $aSubject = $request->textarea5;
            $aDescription = $request->textarea6;

            $this->eventRepository
            ->UpdateActivityMetaNoImage($aId,$aTitle,$aDescription,$aSubject);
        }
        return response()->json(['success'=>'success']);
    }

    public function delEvent(Request $request)
    {
        $id = $request->id;

        $this->eventRepository
            ->delEvent($id);

        return 'OK';
    }
}
