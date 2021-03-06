<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\BannerClick;
use App\StoreClick;
use App\ActivityClick;
use App\ShareClick;
use DB;
use App\Register;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function allevent()
    {
        $today = Carbon::now()->format('Y-m-d');

        $event = $this->eventRepository
                ->getAllActivity($today);

        return $event;
    }

    public function playing()
    {
        $today = Carbon::now()->format('Y-m-d');

        $event = $this->eventRepository
                ->getplayActivity($today);

        return $event;
    }

    public function ending()
    {
        $today = Carbon::now()->format('Y-m-d');

        $event = $this->eventRepository
                ->getendActivity($today);

        return $event;
    }

    public function searchActivities(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $date = $request->date;

        $event = $this->eventRepository
                ->getsearchActivity($date,$today);

        return $event;
    }

    public function showAward(Request $request)
    {
        $no = $request->no;

        $award = $this->eventRepository
                ->showAward($no);

        return $award;
    }

    public function selProduct(Request $request)
    {
        $product = $request->productCategory;
        $id = $request->aId;

        $pName = $this->eventRepository
                ->selProduct($id,$product);

        return $pName;

    }

    public function registerSubmit(Request $request)
    {
        //dd($request->all());
        if($request->aMode == 'S'){
            if($request->aInvoice == '00'){

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                    ],
                    [
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                    ]);
                }
                else{

                    $validator = Validator::make($request->all(),
                    [
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                    ],
                    [
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                    ]);
                }

                
            }
            else if($request->aInvoice == '10'){

                if($request->netbuy){
                   $validator = Validator::make($request->all(),
                    [
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                    ],
                    [
                        'upload.required'=>'?????????????????????',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                        'storePurchase'=>'required',
                    ],
                    [
                        'upload.required'=>'?????????????????????',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                        'storePurchase.required'=>'??????????????????',
                    ]);
                }
            }
            else if($request->aInvoice == '01'){

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                        'storePurchase'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                        'storePurchase.required'=>'??????????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                        'storePurchase'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                        'storePurchase.required'=>'??????????????????',
                    ]);
                }
            }
            else{

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'upload.required'=>'?????????????????????',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'ownBrand'=>'required',
                        'storePurchase'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'upload.required'=>'?????????????????????',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                        'ownBrand.required'=>'?????????????????????',
                        'storePurchase.required'=>'??????????????????',
                    ]);
                }
            }
        }
        else if($request->aMode == 'P'){
            if($request->aInvoice == '00'){

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'applyNumber'=>'required',
                    ],
                    [
                        'applyNumber.required'=>'?????????????????????',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'productCategory'=>'required',
                        'productName'=>'required',
                    ],
                    [
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
            }
            else if($request->aInvoice == '10'){

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'applyNumber'=>'required',
                    ],
                    [
                        'upload.required'=>'?????????????????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'applyNumber.required'=>'?????????????????????',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        'productCategory'=>'required',
                        'productName'=>'required',
                    ],
                    [
                        'upload.required'=>'?????????????????????',
                        'upload.mimes'=>'?????????????????????????????? Ex:jpg,jpeg,png',
                        'upload.max'=>'???????????????????????????1M?????????',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
            }
            else if($request->aInvoice == '01'){

                if($request->netbuy){
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'productCategory'=>'required',
                        'productName'=>'required',
                        'applyNumber'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'applyNumber.required'=>'?????????????????????',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
                else{
                    $validator = Validator::make($request->all(),
                    [
                        'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                        'productCategory'=>'required',
                        'productName'=>'required',
                    ],
                    [
                        'applyInvoice.required' => '?????????????????????',
                        'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                        'productCategory.required'=>'???????????????',
                        'productName.required'=>'???????????????',
                    ]);
                }
            }
            else{

                if($request->netbuy){

                    if($request->aId == '13'){
                        $validator = Validator::make($request->all(),
                            [
                                'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                                'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                                'productCategory'=>'required',
                                'productName'=>'required',
                                'applyNumber'=>'required',
                                'storePurchase'=>'required',
                                'rQuantity'=>'required',
                            ],
                            [
                                'applyInvoice.required' => '?????????????????????',
                                'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                                'upload.max'=>'???????????????????????????1M?????????',
                                'upload.required'=>'?????????????????????',
                                'upload.mimes'=>'?????????????????????????????? Ex:jpg,jepg,png',
                                'storePurchase.required'=>'??????????????????',
                                'applyNumber.required'=>'?????????????????????',
                                'productCategory.required'=>'???????????????',
                                'productName.required'=>'???????????????',
                                'rQuantity.required'=>'???????????????',
                            ]);
                    }
                    else{
                        $validator = Validator::make($request->all(),

                            [
                                'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                                'upload'=>'required|mimes:gif,jpg,jpeg,png|max:100000',
                        // 'productCategory'=>'required',
                        // 'productName'=>'required',
                                'applyNumber'=>'required',
                                'storePurchase'=>'required',
                                'rQuantity'=>'required',
                            ],
                            [
                                'applyInvoice.required' => '?????????????????????',
                                'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                                'upload.max'=>'???????????????????????????1M?????????',
                                'upload.required'=>'?????????????????????',
                                'upload.mimes'=>'?????????????????????????????? Ex:jpg,jepg,png',
                                'storePurchase.required'=>'??????????????????',
                                'applyNumber.required'=>'?????????????????????',
                        // 'productCategory.required'=>'???????????????',
                        // 'productName.required'=>'???????????????',
                                'rQuantity.required'=>'???????????????',
                            ]);
                    }

                     
                }
                else{

                    if($request->aId == '14'){
                        $validator = Validator::make($request->all(),
                            [
                                'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                                'upload'=>'required|mimes:gif,jpg,jpeg,png',
                                // 'productCategory'=>'required',
                                // 'productName'=>'required',
                                'storePurchase2'=>'required',
                                'rQuantity'=>'required',
                            ],
                            [
                                'applyInvoice.required' => '?????????????????????',
                                'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                                //'upload.max'=>'???????????????????????????1M?????????',
                                'upload.required'=>'?????????????????????',
                                'upload.mimes'=>'?????????????????????????????? Ex:jpg,jepg,png',
                                'storePurchase2.required'=>'??????????????????',
                                // 'productCategory.required'=>'???????????????',
                                // 'productName.required'=>'???????????????',
                                'rQuantity.required'=>'???????????????',
                            ]);
                    }
                    if($request->aId == '13'){
                        $validator = Validator::make($request->all(),
                            [
                                'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                                'upload'=>'required|mimes:gif,jpg,jpeg,png',
                                'productCategory'=>'required',
                                'productName'=>'required',
                                'storePurchase2'=>'required',
                                'rQuantity'=>'required',
                            ],
                            [
                                'applyInvoice.required' => '?????????????????????',
                                'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                                'upload.max'=>'???????????????????????????1M?????????',
                                'upload.required'=>'?????????????????????',
                                'upload.mimes'=>'?????????????????????????????? Ex:jpg,jepg,png',
                                'storePurchase2.required'=>'??????????????????',
                                'productCategory.required'=>'???????????????',
                                'productName.required'=>'???????????????',
                                'rQuantity.required'=>'???????????????',
                            ]);
                    }
                    else{
                        $validator = Validator::make($request->all(),
                            [
                                'applyInvoice'=>'required|regex:/^[A-Z]{2}+[0-9]{8}/',
                                'upload'=>'required|mimes:gif,jpg,jpeg,png',
                                'rQuantity'=>'required',
                                // 'productCategory'=>'required',
                                // 'productName'=>'required',
                                // 'storePurchase2'=>'required',
                            ],
                            [
                                'applyInvoice.required' => '?????????????????????',
                                'applyInvoice.regex'=>'???????????????????????????????????? EX:AB12345678',
                                //'upload.max'=>'???????????????????????????1M?????????',
                                'upload.required'=>'?????????????????????',
                                'upload.mimes'=>'?????????????????????????????? Ex:jpg,jepg,png',
                                'rQuantity.required'=>'???????????????',
                                // 'storePurchase2.required'=>'??????????????????',
                                // 'productCategory.required'=>'???????????????',
                                // 'productName.required'=>'???????????????',
                            ]);
                    }
                }
            }
        }


        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else{
            if ($request->hasFile('upload'))
            {

                $filename = $request->file('upload')->getClientOriginalName();
                $today = Carbon::now()->format('Ymd');
                $id = $request->consumerid;
                $fileNewname = $today.'_'.$id.'_'.$filename;


                $request->file('upload')->storeAs('/media/event',$fileNewname,'public_uploads');

                $upload = 'https://www.logitech-event.com.tw'.'/media/event/'.$fileNewname;
                $array = json_encode($request->all());

                $aId = $request->aId;
                $productName = $request->productName;
                $ownBrand = '';

                if($request->netbuy){
                    $netnumber = $request->applyNumber;
                    $store = $request->storePurchase;
                }
                else{
                    $netnumber = 'Null';
                    $store = $request->storePurchase2;
                }

                $applyInvoice = $request->applyInvoice;
                $rQuantity = $request->rQuantity;
                //$store = $request->storePurchase;

                //$QRmode = $request->aQRmode;

                $rank = null;

                if($request->productName == '48' || $request->productName == '49'){

                    $re = Register::where('rActivity','13')->whereIn('rProduct',['48','49'])->get();

                    if($re->isEmpty()){

                        $rank = '1';

                        $this->eventRepository
                        ->InsertEvent($aId,$id,$productName,$ownBrand,$netnumber,$applyInvoice,$upload,$store,$array,$rQuantity,$rank);

                        return response()->json(['success'=>['can']]);
                    }
                    else{

                        foreach ($re as $key => $value) {
                            if($key == count($re) - 1 ){

                                $rank = count($re)+1;

                                $this->eventRepository
                                ->InsertEvent($aId,$id,$productName,$ownBrand,$netnumber,$applyInvoice,$upload,$store,$array,$rQuantity,$rank);
                            }
                        }

                        if($rank <= 28){
                            return response()->json(['success'=>['can']]);
                        }
                        else{
                            return response()->json(['success'=>['cant']]);
                        }
                    }
                }
                else{
                    $this->eventRepository
                    ->InsertEvent($aId,$id,$productName,$ownBrand,$netnumber,$applyInvoice,$upload,$store,$array,$rQuantity,$rank);

                    return response()->json(['success'=>['ok']]);
                }

            }
            else{

                $upload = '';
                $array = json_encode($request->all());

                $aId = $request->aId;
                $id = $request->consumerid;
                $productName = $request->productName;
                $ownBrand = '';

                if($request->netbuy){
                    $netnumber = $request->applyNumber;
                    $store = $request->storePurchase;
                }
                else{
                    $netnumber = 'Null';
                    $store = $request->storePurchase2;
                }

                $applyInvoice = $request->applyInvoice;
                $rQuantity = $request->rQuantity;
                //$store = $request->storePurchase;

                $QRmode = $request->aQRmode;

                $rank = null;


                $this->eventRepository
                ->InsertEvent($aId,$id,$productName,$ownBrand,$netnumber,$applyInvoice,$upload,$store,$array,$rQuantity,$rank);

                return response()->json(['success'=>['ok']]);
            }
        }
        
    }


    public function getProductImage (Request $request)
    {
        $id = $request->pId;

        $image = $this->eventRepository
                ->getProductImage($id);

        return $image;
    }

    public function BannerClick(Request $request)
    {

        $bannerId = $request->bannerId;
        $consumerId = $request->consumerId;

        DB::table('aBannerClick')
            ->insert(
                    ['BannerId' => $bannerId, 
                     'ConsumerId' => $consumerId,]
                );
    }

    public function StoreClick(Request $request)
    {

        $StoreId = $request->StoreId;
        $consumerId = $request->consumerId;

        DB::table('aStoreClick')
            ->insert(
                    ['StoreId' => $StoreId, 
                     'ConsumerId' => $consumerId,]
                );
    }

    public function ActivityClick(Request $request)
    {

        $ActivityId = $request->ActivityId;
        $consumerId = $request->consumerId;

        DB::table('aActivitiesClick')
            ->insert(
                    ['aActivity' => $ActivityId, 
                     'aConsumer' => $consumerId,]
                );
    }

    public function ShareClick(Request $request)
    {
        $activity = $request->activity;
        $type = $request->type;
        $consumerId = $request->consumerId;

        DB::table('aShareClick')
            ->insert(
                    ['ActivityId'=>$activity,
                     'type' => $type, 
                     'consumerId' => $consumerId,]
                );
    }

    public function ShareClick2(Request $request)
    {
        $activity = $request->activity;
        $type = $request->type;
        $consumerId = $request->consumerId;

        DB::table('aShareClick')
            ->insert(
                    ['ActivityId'=>$activity,
                     'type' => $type, 
                     'consumerId' => $consumerId,]
                );
    }
}
