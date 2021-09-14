<?php
namespace App\Repositories\back;

use Doctrine\Common\Collections\Collection;
use App\Consumer;
use App\Activities;
use App\Register;
use App\BannerClick;
use App\StoreClick;
use DB;
use App\ShareClick;

class DashboardRepository
{
	/* 注入activities model */
	protected $consumer;
	protected $activities;
	protected $register;
	protected $bannerClick;
	protected $storeClick;
	protected $shareClick;

	public function __construct(Consumer $consumer,Activities $activities,Register $register,BannerClick $bannerClick,StoreClick $storeClick,shareClick $shareClick)
	{
		$this->consumer = $consumer;
		$this->activities = $activities;
		$this->register = $register;
		$this->bannerClick = $bannerClick;
		$this->storeClick = $storeClick;
		$this->shareClick = $shareClick;
	}

	public function getSexConsumerOneMonth($month,$today)
	{
		return [$this->consumer
				->where('cGender','M')
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$month, $today])
				->count()
				,
				$this->consumer
				->where('cGender','F')
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$month, $today])
				->count()
				,
				$this->consumer
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$month, $today])
				->count()];
	}

	public function getNewOldMember($month,$today)
	{
		return [$this->consumer
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$month, $today])
				->count()
				,
				$this->consumer
				->where('cStatus','Y')
				->count()];
	}

	public function getAgeMember($month,$today)
	{
		return  [DB::select('
			SELECT count(*) as M_18 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND DATEDIFF(NOW(),cBirthday)/365<18 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_18 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND DATEDIFF(NOW(),cBirthday)/365<18 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_1824 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND DATEDIFF(NOW(),cBirthday)/365>=18 AND DATEDIFF(NOW(),cBirthday)/365<=24 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_1824 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=18 AND DATEDIFF(NOW(),cBirthday)/365<=24 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_2534 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=25 AND DATEDIFF(NOW(),cBirthday)/365<=34 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_2534 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=25 AND DATEDIFF(NOW(),cBirthday)/365<=34 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_3544 FROM aConsumer WHERE  cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND DATEDIFF(NOW(),cBirthday)/365>=35 AND DATEDIFF(NOW(),cBirthday)/365<=44 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_3544 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=35 AND DATEDIFF(NOW(),cBirthday)/365<=44 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_4554 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=45 AND DATEDIFF(NOW(),cBirthday)/365<=54 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_4554 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=45 AND DATEDIFF(NOW(),cBirthday)/365<=54 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_5565 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=55 AND DATEDIFF(NOW(),cBirthday)/365<=65 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_5565 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>=55 AND DATEDIFF(NOW(),cBirthday)/365<=65 AND cGender = "F" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as M_65 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>65 AND cGender = "M" AND cStatus="Y"')
			,
			DB::select('
			SELECT count(*) as F_65 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$month.'" AND "'.$today.'" AND  DATEDIFF(NOW(),cBirthday)/365>65 AND cGender = "F" AND cStatus="Y"')];
	}

	public function getAreaMember($month,$today)
	{
		return [$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','北')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','中')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','南')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','東')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()];
	}

	public function getActivity($month)
	{
		return DB::select('
			SELECT id,aTitle,aType,aStartDate,aEndDate,
			(SELECT COUNT(*) FROM aActivitiesClick  WHERE aActivitiesClick.aCreateDateTime BETWEEN a.aStartRegister AND a.aEndRegister AND aActivitiesClick.aActivity=a.id) AS active_click,
			(SELECT COUNT(*) FROM aRegister WHERE  aRegister.rCreateDateTime BETWEEN a.aStartRegister AND a.aEndRegister AND aRegister.rActivity=a.id) AS active_login
			FROM
			aActivities as a
			Order By a.id desc');
	}

	public function NorthMemberArea($month,$today)
	{
		return $this->consumer
				->select(
                        DB::raw("count(*) as count"),
                    	DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','北')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function MidMemberArea($month,$today)
	{
		return $this->consumer
				->select(
                        DB::raw("count(*) as count"),
                    	DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','中')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function SouthMemberArea($month,$today)
	{
		return $this->consumer
				->select(
                        DB::raw("count(*) as count"),
                    	DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','南')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function EastMemberArea($month,$today)
	{
		return $this->consumer
				->select(
                        DB::raw("count(*) as count"),
                    	DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','東')
				->whereBetween('cCreateDateTime', [$month, $today])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function DashboardDataSearch($start,$end)
	{
		return [$this->consumer //男生
				->where('cGender','M')
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$start, $end])
				->count()
				,
				$this->consumer //女生
				->where('cGender','F')
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$start, $end])
				->count()
				,
				$this->consumer //男女生
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$start, $end])
				->count()
				,
				$this->consumer //新會員
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$start, $end])
				->count()
				,
				$this->consumer //全部會員
				->where('cStatus','Y')
				->count()
				,
				DB::select('
					SELECT count(*) as M_18 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND DATEDIFF(NOW(),cBirthday)/365<18 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_18 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND DATEDIFF(NOW(),cBirthday)/365<18 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_1824 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND DATEDIFF(NOW(),cBirthday)/365>=18 AND DATEDIFF(NOW(),cBirthday)/365<=24 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_1824 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=18 AND DATEDIFF(NOW(),cBirthday)/365<=24 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_2534 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=25 AND DATEDIFF(NOW(),cBirthday)/365<=34 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_2534 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=25 AND DATEDIFF(NOW(),cBirthday)/365<=34 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_3544 FROM aConsumer WHERE  cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND DATEDIFF(NOW(),cBirthday)/365>=35 AND DATEDIFF(NOW(),cBirthday)/365<=44 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_3544 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=35 AND DATEDIFF(NOW(),cBirthday)/365<=44 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_4554 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=45 AND DATEDIFF(NOW(),cBirthday)/365<=54 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_4554 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=45 AND DATEDIFF(NOW(),cBirthday)/365<=54 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_5565 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=55 AND DATEDIFF(NOW(),cBirthday)/365<=65 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_5565 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>=55 AND DATEDIFF(NOW(),cBirthday)/365<=65 AND cGender = "F" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as M_65 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>65 AND cGender = "M" AND cStatus="Y"')
				,
				DB::select('
					SELECT count(*) as F_65 FROM aConsumer WHERE cCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND  DATEDIFF(NOW(),cBirthday)/365>65 AND cGender = "F" AND cStatus="Y"')
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','北')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','中')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','南')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->leftjoin('aZiparea','aConsumer.cZip','=','aZiparea.zZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','東')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zZone')
				->orderBy('aZiparea.zZone','asc')
				->count()
				,
				$this->consumer
				->select(
                        DB::raw("count(*) as count"),
                    	DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','北')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->consumer
				->select(
					DB::raw("count(*) as count"),
					DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','中')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->consumer
				->select(
					DB::raw("count(*) as count"),
					DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','南')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->consumer
				->select(
					DB::raw("count(*) as count"),
					DB::raw("aZiparea.zCity"))
				->leftjoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->where('aConsumer.cStatus','Y')
				->where('aZiparea.zZone','東')
				->whereBetween('cCreateDateTime', [$start, $end])
				->groupBy('aZiparea.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()];
	}

	public function ActiveSearch($start,$end)
	{
		return DB::select('
			SELECT id,aTitle,aType,aStartDate,aEndDate,
			(SELECT COUNT(*) FROM aActivitiesClick  WHERE aActivitiesClick.aCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND aActivitiesClick.aActivity=a.id) AS active_click,
			(SELECT COUNT(*) FROM aRegister WHERE  aRegister.rCreateDateTime BETWEEN "'.$start.'" AND "'.$end.'" AND aRegister.rActivity=a.id) AS active_login
			FROM
			aActivities as a
			Order By a.id desc');
	}

	public function getActivityDetail($id)
	{
		return $this->activities
					->where('id',$id)
					->get();
	}

	public function getRegisterArea($id,$start,$end)
	{
		return $this->register
				->select(
					DB::raw("count(*) as count"),
					DB::raw("c.zCity"))
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->leftjoin('aZiparea as c','c.zZip','=','b.cZip')
				->where('rActivity',$id)
				->groupBy('c.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function getloginTotal($start,$end)
	{
		return $this->consumer
				->whereBetween('cCreateDateTime', [$start, $end])
				->count();
	}

	public function getloginRegister($id,$start,$end)
	{
		return $this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->count();
	}

	public function getGenderRegister($id,$start,$end)
	{
		return [
				$this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->where('b.cGender','M')
				->count()
				,
				$this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->where('b.cGender','F')
				->count()
				];
	}

	public function getRegisterProduct($id,$start,$end)
	{
		return $this->register
				->select(
					DB::raw("count(*) as count"),
					DB::raw("sum(aRegister.rQuantity) as sum"),
					DB::raw("c.pName"))
				->leftjoin('aProductList as c','c.pId','=','aRegister.rProduct')
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->where('rActivity',$id)
				->groupBy('c.pName')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function getBannerClick($id,$start,$end)
	{
		return $this->bannerClick
				->select(
					DB::raw("count(*) as count"),
					DB::raw("b.sTitle"))
				->leftjoin('aSiders as b','b.aId','=','aBannerClick.BannerId')
				->whereBetween('aBannerClick.created_at', [$start, $end])
				->groupBy('aBannerClick.BannerId')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();

	}

	public function getBannerClickMember($id,$start,$end)
	{
		return [
				$this->bannerClick
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->bannerClick
				->where('ConsumerId','!=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->bannerClick
				->where('ConsumerId','=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				];
	}

	public function getStoreClick($id,$start,$end)
	{
		return $this->storeClick
				->select(
					DB::raw("count(*) as count"),
					DB::raw("b.sName"))
				->leftjoin('aStore as b','b.sId','=','aStoreClick.StoreId')
				->whereBetween('aStoreClick.created_at', [$start, $end])
				->groupBy('aStoreClick.StoreId')
				->orderBy(DB::raw('count(*)'),'desc')
				->get();
	}

	public function getStoreClickMember($id,$start,$end)
	{
		return [
				$this->storeClick
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->storeClick
				->where('ConsumerId','!=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->storeClick
				->where('ConsumerId','=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				];
	}

	// public function getShareClick($id,$start,$end)
	// {
	// 	return [
	// 			$this->shareClick
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			,
	// 			$this->shareClick
	// 			->where('ConsumerId','!=','0')
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			,
	// 			$this->shareClick
	// 			->where('ConsumerId','=','0')
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			,
	// 			$this->shareClick
	// 			->where('type','=','FB')
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			,
	// 			$this->shareClick
	// 			->where('type','=','Line')
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			,
	// 			$this->shareClick
	// 			->where('type','=','Email')
	// 			->whereBetween('created_at', [$start, $end])
	// 			->count()
	// 			];
	// }

	public function regSearch($id,$start,$end)
	{
		return [
				$this->register
				->select(
					DB::raw("count(*) as count"),
					DB::raw("c.zCity"))
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->leftjoin('aZiparea as c','c.zZip','=','b.cZip')
				->where('rActivity',$id)
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->groupBy('c.zCity')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->consumer
				->where('cStatus','Y')
				->whereBetween('cCreateDateTime', [$start, $end])
				->count()
				,
				$this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->count()
				,
				$this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->where('b.cGender','M')
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->count()
				,
				$this->register
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->where('aRegister.rActivity',$id)
				->where('b.cGender','F')
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->count()
				,
				$this->bannerClick
				->select(
					DB::raw("count(*) as count"),
					DB::raw("b.sTitle"))
				->leftjoin('aSiders as b','b.aId','=','aBannerClick.BannerId')
				->whereBetween('aBannerClick.created_at', [$start, $end])
				->groupBy('aBannerClick.BannerId')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->bannerClick
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->bannerClick
				->where('ConsumerId','!=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->bannerClick
				->where('ConsumerId','=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->storeClick
				->select(
					DB::raw("count(*) as count"),
					DB::raw("b.sName"))
				->leftjoin('aStore as b','b.sId','=','aStoreClick.StoreId')
				->whereBetween('aStoreClick.created_at', [$start, $end])
				->groupBy('aStoreClick.StoreId')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->storeClick
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->storeClick
				->where('ConsumerId','!=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->storeClick
				->where('ConsumerId','=','0')
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->register
				->select(
					DB::raw("count(*) as count"),
					DB::raw("c.pName"))
				->leftjoin('aConsumer as b','b.id','=','aRegister.rConsumer')
				->leftjoin('aProductList as c','c.pId','=','aRegister.rProduct')
				->where('rActivity',$id)
				->whereBetween('aRegister.rCreateDateTime', [$start, $end])
				->groupBy('c.pName')
				->orderBy(DB::raw('count(*)'),'desc')
				->get()
				,
				$this->shareClick
				->where('type','=','FB')
				->where('ActivityId',$id)
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->shareClick
				->where('type','=','Line')
				->where('ActivityId',$id)
				->whereBetween('created_at', [$start, $end])
				->count()
				,
				$this->shareClick
				->where('type','=','Email')
				->where('ActivityId',$id)
				->whereBetween('created_at', [$start, $end])
				->count()
			];

	}

}

?>