<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Activities;
use App\Siders;
use App\Award;
use App\Ziparea;
use App\Consumer;
use App\Store;
use App\ProductList;
use App\Register;
use App\ActStore;
use App\Style;

class EventRepository
{
	/* 注入activities model */
	protected $activities;
	protected $siders;
	protected $award;
	protected $ziparea;
	protected $consumer;
	protected $store;
	protected $productlist;
	protected $register;
	protected $actstore;
	protected $style;


	public function __construct(Activities $activities, Siders $siders, Award $award , Ziparea $ziparea , Consumer $consumer , Store $store , ProductList $productlist , Register $register, ActStore $actstore,Style $style)
	{
		$this->activities = $activities;
		$this->siders = $siders;
		$this->award = $award;
		$this->ziparea = $ziparea;
		$this->consumer = $consumer;
		$this->store = $store;
		$this->productlist = $productlist;
		$this->register = $register;
		$this->actstore = $actstore;
		$this->style = $style;
	}

	//取得全部活動
	public function getAllActivity($date)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('aStartDate','<=',$date)
				->Orderby('id','desc')
				->get();
	}

	//取得進行中活動
	public function getplayActivity($date)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('aStartDate','<=',$date)
				->where('aEndDate','>',$date)
				->Orderby('id','desc')
				->get();
	}

	//取得已結束活動
	public function getendActivity($date)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('aEndDate','<',$date)
				->Orderby('id','desc')
				->get();
	}

	//取得活動搜尋結果
	public function getsearchActivity($date,$today)
	{
		return $this->activities
				->where('aStatus','Y')
				->whereBetween('aStartDate', [$date, $today])
				->Orderby('id','desc')
				->get();
	}

	//取得活動資訊
	public function getActivity($id)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('id',$id)
				->get();
	}

	//取得Siders
	public function getSiders($today)
	{
		return $this->siders
				->where('sStatus','Y')
				->where('sStartDate','<',$today)
				->where('sEndDate','>',$today)
				->Orderby('aId','desc')
				->get();
	}

	//取得得獎公告
	public function showAward($no)
	{
		return $this->award
				->where('aActivity',$no)
				->get();
	}

	//取得縣市
	public function getcity()
	{
		return $this->ziparea
				->groupBy('zCity')
				->orderBy('zZip','asc')
				->get();
	}

	//取得郵遞區號
	public function getzip($id)
	{
		return $this->consumer::find($id)->zip;
	}

	//取得地區
	public function getArea($city)
	{
		return $this->ziparea
				->where('zCity',$city)
				->get();
	}

	//更新驗證碼
	public function updateAuthcode($id,$authcode)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cAuthCode'=> $authcode]);
	}

	//更新重寄驗證碼
	public function updateResendAuthcode($id,$authcode)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cAuthCode'=> $authcode]);
	}

	//取得consumer資訊
	public function getConsumer($id)
	{
		return $this->consumer
				->where('id',$id)
				->get();
	}

	//更新驗證OK欄位
	public function updateAuthOK($id)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cAuthOK'=> 'Y']);
	}

	//取得特定產品
	public function getProduct($id)
	{
		return $this->activities
				->select('c.pCategory')
				->leftJoin('aActProducts as b','b.aActivity','=','aActivities.id')
				->leftJoin('aProductList as c','c.pId','=','b.aProduct')
				->Where('id',$id)
				->groupBy('c.pCategory')
				->orderBy('b.aId')
				->get();
	}

	//取得產品名稱
	public function selProduct($id,$category)
	{
		return $this->activities
				->select('c.*')
				->leftJoin('aActProducts as b','b.aActivity','=','aActivities.id')
				->leftJoin('aProductList as c','c.pId','=','b.aProduct')
				->where('id',$id)
				->where('c.pCategory',$category)
				->orderBy('c.pId')
				->get();
	}

	//取得網購商店名稱
	public function getStore($id)
	{
		return $this->actstore
				->leftJoin('aStore','aActStores.aStore','=','aStore.sId')
				->where('aActivity',$id)
				->where('sCity','網購')
				->get();
	}

	//取得實體商店名稱
	public function getrealStore($id)
	{
		return $this->actstore
				->leftJoin('aStore','aActStores.aStore','=','aStore.sId')
				->where('aActivity',$id)
				->where('sCity','實體')
				->get();
	}

	//取得舊換新模式是否參加
	public function getConsumerRegister($cId,$aId)
	{
		return $this->consumer
				->leftJoin('aRegister as b','b.rConsumer','=','aConsumer.id')
				->where('aConsumer.id',$cId)
				->where('b.rActivity',$aId)
				->get();
	}

	//取得贈品圖
	public function getProductImage($id)
	{
		return $this->productlist
				->where('pId',$id)
				->get();
	}

	//登錄發票-活動
	public function InsertEvent($aId,$id,$productName,$ownBrand,$netnumber,$applyInvoice,$upload,$store,$array,$rQuantity,$rank)
	{
		return $this->register
				->insert(
					['rActivity' => $aId, 
					 'rConsumer' => $id,
					 'rProduct' => $productName,
					 'rHolds' => $ownBrand,
					 'rNetNumber'=>$netnumber,
					 'rInvoiceNo' => $applyInvoice,
					 'rInvoiceImage' => $upload,
					 'rStore'=>$store,
					 'rData' => $array,
					 'rQuantity'=>$rQuantity,
					 'rank'=>$rank]
				);
	}

	public function getcss()
	{
		return $this->style
					->first();
	}
}


?>