<?php
namespace App\Repositories\back;

use Doctrine\Common\Collections\Collection;
use App\Consumer;
use DB;

class MemberRepository
{
	/* 注入activities model */
	protected $consumer;

	public function __construct(Consumer $consumer)
	{
		$this->consumer = $consumer;
	}

	public function getMemeberData()
	{
		$user = DB::select('
			SELECT DISTINCT a.*,b.zCity,b.zArea,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "1") AS aa,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "2") AS bb,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "4") AS cc,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "26") AS dd
			FROM aConsumer as a 
			LEFT JOIN aZiparea as b on a.cZip = b.zZip 
			LEFT JOIN aRegister as c on c.rConsumer = a.id
			LEFT JOIN aActivities as d on d.id = c.rActivity
			WHERE cStatus = "Y"
			ORDER BY a.id DESC');

		return $user;
	}

	public function getMemberSearch($start,$end)
	{
		$user = DB::select('
			SELECT DISTINCT a.*,b.zCity,b.zArea,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "1") AS aa,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "2") AS bb,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "4") AS cc,
			(SELECT DISTINCT COUNT(*) FROM aRegister WHERE  aRegister.rConsumer=a.id AND aRegister.rActivity = "26") AS dd
			FROM aConsumer as a 
			LEFT JOIN aZiparea as b on a.cZip = b.zZip 
			LEFT JOIN aRegister as c on c.rConsumer = a.id
			LEFT JOIN aActivities as d on d.id = c.rActivity
			WHERE cStatus = "Y"
			AND `cCreateDateTime` >= DATE_SUB("'.$start.'",INTERVAL 0 DAY) AND `cCreateDateTime` < DATE_SUB("'.$end.'",INTERVAL -1 DAY)
			ORDER BY a.id DESC');

		return $user;
	}

	public function getMemberInfo($id)
	{
		return $this->consumer
				->select('aConsumer.*','aZiparea.*','c.aTitle','aProductList.pName as product','c.aCreateDateTime as regTime','c.aEndDate as endDate','c.id as AID')
				->leftJoin('aRegister as b','b.rConsumer','=','aConsumer.id')
				->leftJoin('aActivities as c','c.id','=','b.rActivity')
				->leftJoin('aZiparea','aZiparea.zZip','=','aConsumer.cZip')
				->leftJoin('aProductList','aProductList.pId','=','b.rProduct')
				->where('aConsumer.id',$id)
				->get();		
	}
}


?>