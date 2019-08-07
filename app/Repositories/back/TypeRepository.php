<?php
namespace App\Repositories\back;

use Doctrine\Common\Collections\Collection;
use App\Siders;
use App\Activities;
use App\Style;

class TypeRepository
{
	/* 注入activities model */
	protected $siders;
	protected $activities;
	protected $style;

	public function __construct(Siders $siders,Activities $activities,Style $style)
	{
		$this->siders = $siders;
		$this->activities = $activities;
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

	public function getAllActivity($today)
	{
		return $this->activities
					->where('aStatus','Y')
					->where('aEndDate','>',$today)
					->Orderby('id','asc')
					->get();
	}

	public function getActTime($id)
	{
		return $this->activities
				->select('aActivities.aStartDate','aActivities.aEndDate')
				->where('id',$id)
				->get();
	}

	public function InsertSiders($title,$type,$url,$activity,$startDate,$endDate,$image)
	{

		return $this->siders
				->insert(
					['sTitle' => $title,
					 'sType' => $type,
					 'sUrl' => $url,
					 'sActivity' => $activity,
					 'sStartDate'=>$startDate,
					 'sEndDate'=>$endDate,
					 'sImage' => $image]
				);
	}

	public function UpdateSiders($id,$title,$type,$url,$activity,$startDate,$endDate,$image)
	{

		return $this->siders
				->where('aId',$id)
				->update(['sTitle' => $title,
						  'sType' => $type,
						  'sUrl' => $url,
						  'sActivity' => $activity,
						  'sStartDate'=>$startDate,
						  'sEndDate'=>$endDate,
						  'sImage' => $image]);
	}

	public function UpdateSidersNoImage($id,$title,$type,$url,$activity,$startDate,$endDate)
	{

		return $this->siders
				->where('aId',$id)
				->update(['sTitle' => $title,
						  'sType' => $type,
						  'sUrl' => $url,
						  'sActivity' => $activity,
						  'sStartDate'=>$startDate,
						  'sEndDate'=>$endDate,]);
	}

	public function UpdateCSS($sId,$css)
	{
		return $this->style
				->where('sId',$sId)
				->update(['sCSS' => $css]);
	}

	public function delBanner($id)
	{
		return $this->siders
				->where('aId',$id)
				->update(['sStatus' => 'N']);
	}
}


?>