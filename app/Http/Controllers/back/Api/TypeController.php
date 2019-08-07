<?php

namespace App\Http\Controllers\back\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\TypeRepository;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
    	$this->typeRepository = $typeRepository;
    }

    public function getActTime(Request $request)
    {
    	$activity = $request->activity;

    	$act = $this->typeRepository
    			->getActTime($activity);

    	return $act;
    }

    public function addBanner(Request $request)
    {
    	//dd($request->all());

    	$validator = Validator::make($request->all(),
                    [
                        'addmode'=>'required',
                    ],
                    [
                        'addmode.required'=>'請選擇Banner模式',

                    ]);

    	if($request->addmode == 'A'){
            $validator = Validator::make($request->all(),
                    [
                        'BannerTitle'=>'required',
                        'BannerActivity'=>'required',
                        'BStartDate'=>'required',
                        'BEndDate'=>'required',
                        'BannerImage'=>'required|mimes:gif,jpg,jpeg,png',
                    ],
                    [
                        'BannerTitle.required'=>'請填寫Banner標題',
                        'BannerActivity.required'=>'請選擇活動',
                        'BStartDate.required'=>'請選擇起始時間',
                        'BEndDate.required'=>'請選擇結束時間',
                        'BannerImage.required'=>'請上傳Banner圖片',
                        'BannerImage.mimes'=>'請上傳正確的圖片格式 Ex:jpg,jpeg,png',

                    ]);
        }
        else{
        	$validator = Validator::make($request->all(),
                    [
                        'BannerTitle'=>'required',
                        'BStartDate'=>'required',
                        'BEndDate'=>'required',
                        'BannerUrl'=>'required',
                        'BannerImage'=>'required|mimes:gif,jpg,jpeg,png',
                    ],
                    [
                        'BannerTitle.required'=>'請填寫Banner標題',
                        'BStartDate.required'=>'請選擇起始時間',
                        'BEndDate.required'=>'請選擇結束時間',
                        'BannerUrl.required'=>'請填寫外連網址',
                        'BannerImage.required'=>'請上傳Banner圖片',
                        'BannerImage.mimes'=>'請上傳正確的圖片格式 Ex:jpg,jpeg,png',

                    ]);
        }

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	if ($request->hasFile('BannerImage'))
            {

            	$filename = $request->file('BannerImage')->getClientOriginalName();
            	$request->file('BannerImage')->storeAs('/media/banner',$filename,'public_uploads');

            	$upload = '/media/banner/'.$filename;


            	$title = $request->BannerTitle;

            	if($request->addmode == 'A'){
            		$type = 'INNER';
            		$url = 'Javascript:void(0);';
            	}
            	else{
            		$type = 'OUTER';
            		$url = $request->BannerUrl;
            	}

            	$activity = $request->BannerActivity;
            	$start = $request->BStartDate;
            	$end = $request->BEndDate;

            	$this->typeRepository
            		->InsertSiders($title,$type,$url,$activity,$start,$end,$upload);
            }
        }

        return response()->json(['success'=>'success']);
    }


    public function editBanner(Request $request)
    {

    	if($request->mode == 'A'){
            $validator = Validator::make($request->all(),
                    [
                        'EditTitle'=>'required',
                        'EditActivity'=>'required',
                        'StartDate'=>'required',
                        'EndDate'=>'required',
                    ],
                    [
                        'EditTitle.required'=>'請填寫Banner標題',
                        'EditActivity.required'=>'請選擇活動',
                        'StartDate.required'=>'請選擇起始時間',
                        'EndDate.required'=>'請選擇結束時間',

                    ]);
        }
        else{
        	$validator = Validator::make($request->all(),
                    [
                        'EditTitle'=>'required',
                        'StartDate'=>'required',
                        'EndDate'=>'required',
                        'EditUrl'=>'required',
                    ],
                    [
                        'EditTitle.required'=>'請填寫Banner標題',
                        'StartDate.required'=>'請選擇起始時間',
                        'EndDate.required'=>'請選擇結束時間',
                        'EditUrl.required'=>'請填寫外連網址',

                    ]);
        }

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	if ($request->hasFile('EditImage'))
            {

            	$filename = $request->file('EditImage')->getClientOriginalName();
            	$request->file('EditImage')->storeAs('/media/banner',$filename,'public_uploads');

            	$upload = '/media/banner/'.$filename;


            	$aId  = $request->EditaId;
            	$title = $request->EditTitle;

            	if($request->mode == 'A'){
            		$type = 'INNER';
            		$url = 'Javascript:void(0);';
            	}
            	else{
            		$type = 'OUTER';
            		$url = $request->EditUrl;
            	}

            	$activity = $request->EditActivity;
            	$start = $request->StartDate;
            	$end = $request->EndDate;

            	$this->typeRepository
            		->UpdateSiders($aId,$title,$type,$url,$activity,$start,$end,$upload);
            }
            else
            {
            	$aId  = $request->EditaId;
            	$title = $request->EditTitle;

            	if($request->mode == 'A'){
            		$type = 'INNER';
            		$url = 'Javascript:void(0);';
            	}
            	else{
            		$type = 'OUTER';
            		$url = $request->EditUrl;
            	}

            	$activity = $request->EditActivity;
            	$start = $request->StartDate;
            	$end = $request->EndDate;

            	$this->typeRepository
            		->UpdateSidersNoImage($aId,$title,$type,$url,$activity,$start,$end);
            }
        }

        return response()->json(['success'=>'success']);
    }

    public function delBanner(Request $request)
    {
        $id = $request->id;

        $this->typeRepository
            ->delBanner($id);

        return 'OK';
    }

    public function editCSS(Request $request)
    {
    	$validator = Validator::make($request->all(),
    		[
    			'color'=>'required',
    		],
    		[
    			'color.required'=>'請選擇樣式',
    		]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$sId  = '1';
        	$css = '/css/'.$request->color;

        	$this->typeRepository
        	->UpdateCSS($sId,$css);
    
        }

        return response()->json(['success'=>['修改成功']]);
    }
}
