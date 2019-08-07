<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Activities;
use App\Siders;
use App\Consumer;
use App\Ziparea;
use App\Style;

class AwardRepository
{
	/* 注入activities model */
	protected $activities;
	protected $siders;
	protected $consumer;
	protected $ziparea;
	protected $style;


	public function __construct(Activities $activities , Siders $siders , Consumer $consumer , Ziparea $ziparea,Style $style)
	{
		$this->activities = $activities;
		$this->siders = $siders;
		$this->ziparea = $ziparea;
		$this->consumer = $consumer;
		$this->style = $style;
	}

	public function getendActivity($date)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('aEndDate','<',$date)
				->Orderby('id','desc')
				->get();
	}

	public function searchAward($date,$today)
	{
		return $this->activities
				->where('aStatus','Y')
				->where('aEndDate','<',$today)
				->whereBetween('aStartDate', [$date, $today])
				->Orderby('id','desc')
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