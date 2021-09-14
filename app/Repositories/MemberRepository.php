<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Siders;
use App\Consumer;
use App\Ziparea;
use App\Style;

class MemberRepository
{
	/* 注入activities model */
	protected $siders;
	protected $consumer;
	protected $ziparea;
	protected $style;


	public function __construct(Siders $siders , Consumer $consumer , Ziparea $ziparea,Style $style)
	{
		$this->siders = $siders;
		$this->consumer = $consumer;
		$this->ziparea = $ziparea;
		$this->style = $style;
	}

	public function getSiders($today)
	{
		return $this->siders
				->where('sStatus','Y')
				->where('sStartDate','<=',$today)
				->where('sEndDate','>',$today)
				->Orderby('aId','desc')
				->get();
	}

	public function getcity()
	{
		return $this->ziparea
				->groupBy('zCity')
				->orderBy('zZip','asc')
				->get();
	}

	public function updateEmail($id,$email)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cEmail'=>$email]);
	}

	public function updateAddr($id,$zip,$addr)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cZip'=>$zip,
						  'cAddress'=>$addr]);
	}

	public function updateAll($id,$email,$zip,$addr)
	{
		return $this->consumer
				->where('id',$id)
				->update(['cEmail'=>$email,
						  'cZip'=>$zip,
						  'cAddress'=>$addr]);
	}

	public function addressMatchzip($city,$area)
	{
		return $this->ziparea
				->select('zZip')
				->where('zCity',$city)
				->where('zArea',$area)
				->get();
	}

	public function getzip($id)
	{
		return $this->consumer::find($id)->zip;
	}

	public function memberActivity($id)
	{
		return $this->consumer
				->select('aActivities.aTitle as title','aProductList.pName as product','aActivities.id as id','aRegister.rCreateDateTime as regTime','aActivities.aEndDate as endDate','aRegister.rQuantity as quantity')
				->leftJoin('aRegister','aRegister.rConsumer','=','aConsumer.id')
				->leftJoin('aActivities','aActivities.id','=','aRegister.rActivity')
				->leftJoin('aProductList','aProductList.pId','=','aRegister.rProduct')
				->where('aConsumer.id',$id)
				->get();

	}

	public function getcss()
	{
		return $this->style
					->first();
	}
}


?>