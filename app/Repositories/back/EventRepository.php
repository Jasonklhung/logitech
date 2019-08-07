<?php
namespace App\Repositories\back;

use Doctrine\Common\Collections\Collection;
use App\Activities;
use App\Store;
use App\ProductList;
use App\Award;
use App\ActStore;
use App\ActProduct;
use App\ActivityMeta;

class EventRepository
{
	/* 注入activities model */
	protected $activities;
	protected $store;
	protected $productList;
	protected $award;
	protected $actstore;
	protected $actproduct;
	protected $activitymeta;


	public function __construct(Activities $activities, Store $store, ProductList $productList, Award $award, ActStore $actstore, ActProduct $actproduct, ActivityMeta $activitymeta)
	{
		$this->activities = $activities;
		$this->store = $store;
		$this->productList = $productList;
		$this->award = $award;
		$this->actstore = $actstore;
		$this->actproduct = $actproduct;
		$this->activitymeta = $activitymeta;
	}

	//取得全部活動
	public function getAllActivity()
	{
		return $this->activities
				->where('aStatus','Y')
				->Orderby('id','desc')
				->get();
	}

	public function getActivity($id)
	{
		return $this->activities
				->select('aActivities.*','aAward.aState','aActivityMeta.aDescription','aActivityMeta.aSubject')
				->leftjoin('aAward','aActivities.id','=','aAward.aActivity')
				->leftjoin('aActivityMeta','aActivities.id','=','aActivityMeta.aActivity')
				->where('aActivities.id',$id)
				->get();
	}

	public function getActivityProduct($id)
	{
		return $this->activities
				->select('aProductList.*')
				->leftjoin('aActProducts','aActivities.id','=','aActProducts.aActivity')
				->leftjoin('aProductList','aActProducts.aProduct','=','aProductList.pId')
				->where('aActivities.id',$id)
				->get();
	}

	public function getActivityStore($id)
	{
		return $this->activities
				->select('aStore.*')
				->leftjoin('aActStores','aActivities.id','=','aActStores.aActivity')
				->leftjoin('aStore','aActStores.aStore','=','aStore.sId')
				->where('aActivities.id',$id)
				->get();
	}

	public function addProduct($category,$name)
	{
		return $this->productList
				->insert(
					['pCategory' => $category, 
					 'pName' => $name,]
				);
	}

	public function addStore($city,$store)
	{
		return $this->store
				->insert(
					['sCity' => $city, 
					 'sName' => $store,]
				);
	}

	public function getProduct()
	{
		return $this->productList
				->groupBy('pCategory')
				->orderBy('pId','asc')
				->get();
	}

	public function getProductName($category)
	{
		return $this->productList
				->where('pCategory',$category)
				->get();
	}

	public function getstorecity()
	{
		return $this->store
				->groupBy('sCity')
				->orderBy('sId','asc')
				->get();
	}

	public function getStoreName($city)
	{
		return $this->store
				->where('sCity',$city)
				->get();
	}

	public function InsertEvent($aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$upload,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo)
	{
		return $this->activities
				->insert(
					['aTitle' => $aTitle, 
					 'aType' => $aType,
					 'aStartDate' => $aStartDate,
					 'aEndDate' => $aEndDate,
					 'aStartRegister'=>$aStartRegister,
					 'aEndRegister' => $aEndRegister,
					 'aImage' => $upload,
					 'aMode' => $aMode,
					 'aFBLink' => $FBUrl,
					 'aInvoice' => $aInvoice,
					 'aRules' => $aRules,
					 'aCautions' => $aCautions,
					 'aMemo' => $aMemo,]
				);
	}

	public function UpdateEvent($id,$aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$upload,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo)
	{
		return $this->activities
				->where('id',$id)
				->update(['aTitle' => $aTitle, 
						  'aType' => $aType,
						  'aStartDate' => $aStartDate,
						  'aEndDate' => $aEndDate,
						  'aStartRegister'=>$aStartRegister,
						  'aEndRegister' => $aEndRegister,
						  'aImage' => $upload,
						  'aMode' => $aMode,
						  'aFBLink' => $FBUrl,
						  'aInvoice' => $aInvoice,
						  'aRules' => $aRules,
						  'aCautions' => $aCautions,
						  'aMemo' => $aMemo,]);
	}

	public function UpdateEventNoImage($id,$aTitle,$aType,$aStartDate,$aEndDate,$aStartRegister,$aEndRegister,$aMode,$FBUrl,$aInvoice,$aRules,$aCautions,$aMemo)
	{
		return $this->activities
				->where('id',$id)
				->update(['aTitle' => $aTitle, 
						  'aType' => $aType,
						  'aStartDate' => $aStartDate,
						  'aEndDate' => $aEndDate,
						  'aStartRegister'=>$aStartRegister,
						  'aEndRegister' => $aEndRegister,
						  'aMode' => $aMode,
						  'aFBLink' => $FBUrl,
						  'aInvoice' => $aInvoice,
						  'aRules' => $aRules,
						  'aCautions' => $aCautions,
						  'aMemo' => $aMemo,]);
	}

	public function InsertActProduct($aId,$aProduct)
	{
		return $this->actproduct
				->insert(
					['aActivity' => $aId, 
					 'aProduct' => $aProduct,]
				);
	}

	public function DelActProduct($aId)
	{
		return $this->actproduct
					->where('aActivity','=',$aId)
					->delete();
	}

	public function InsertActStore($aId,$aStore)
	{
		return $this->actstore
				->insert(
					['aActivity' => $aId, 
					 'aStore' => $aStore,]
				);
	}

	public function DelActStore($aId)
	{
		return $this->actstore
					->where('aActivity','=',$aId)
					->delete();
	}

	public function InsertActivityMeta($aId,$aTitle,$aDescription,$aSubject,$aImage)
	{
		return $this->activitymeta
				->insert(
					['aActivity' => $aId, 
					 'aTitle' => $aTitle,
					 'aDescription' => $aDescription,
					 'aSubject' => $aSubject,
					 'aImage'=>$aImage]
				);
	}

	public function UpdateActivityMeta($aId,$aTitle,$aDescription,$aSubject,$aImage)
	{

		return $this->activitymeta
				->where('aActivity',$aId)
				->update(['aTitle' => $aTitle,
						  'aDescription' => $aDescription,
						  'aSubject' => $aSubject,
						  'aImage'=>$aImage]);
	}

	public function UpdateActivityMetaNoImage($aId,$aTitle,$aDescription,$aSubject)
	{

		return $this->activitymeta
				->where('aActivity',$aId)
				->update(['aTitle' => $aTitle,
						  'aDescription' => $aDescription,
						  'aSubject' => $aSubject]);
	}

	public function InsertAward($aId,$aState)
	{
		return $this->award
				->insert(
					['aActivity' => $aId, 
					 'aState' => $aState,]
				);
	}

	public function UpdateAward($aId,$aState)
	{
		return $this->award
				->where('aActivity',$aId)
				->update(['aState' => $aState,]);
	}

	public function delEvent($id)
	{
		return $this->activities
				->where('id',$id)
				->update(['aStatus' => 'N']);
	}
}


?>