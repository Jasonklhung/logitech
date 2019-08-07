<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Activities;
use App\Siders;
use App\Consumer;
use App\Ziparea;
use App\Style;

class ActivitiesRepository
{
	/* 注入activities model */
	protected $activities;
	protected $siders;
	protected $ziparea;
	protected $consumer;
	protected $style;

	public function __construct(Activities $activities , Siders $siders , Consumer $consumer , Ziparea $ziparea , Style $style)
	{
		$this->activities = $activities;
		$this->siders = $siders;
		$this->ziparea = $ziparea;
		$this->consumer = $consumer;
		$this->style = $style;
	}

	public function getActivity($date)
	{
		return $this->activities
				->select('aActivities.*','aActivityMeta.aDescription','aActivityMeta.aSubject')
				->leftJoin('aActivityMeta','aActivityMeta.aActivity','=','aActivities.id')
				->where('aStatus','Y')
				->where('aStartDate','<=',$date)
				->where('aEndDate','>',$date)
				->orderBy('id','desc')
				->get();
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

	public function getzip($id)
	{
		return $this->consumer::find($id)->zip;
	}

	public function getcss()
	{
		return $this->style
					->first();
	}
}


?>