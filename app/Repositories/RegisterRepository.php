<?php
namespace App\Repositories;

use Doctrine\Common\Collections\Collection;
use App\Register;


class RegisterRepository
{
	/* 注入activities model */
	protected $register;

	public function __construct(Register $register)
	{
		$this->register = $register;
	}
}


?>