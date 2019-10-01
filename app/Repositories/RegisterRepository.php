<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Register;
use App\Consumer;

class RegisterRepository
{
	/* 注入activities model */
	protected $register;
	protected $consumer;

	public function __construct(Register $register, Consumer $consumer)
	{
		$this->consumer = $consumer;
		$this->register = $register;
	}

	public function updatePass($id,$pass)
	{
		return $this->consumer
				->where('id',$id)
				->update(['password'=>$pass]);
	}
}


?>