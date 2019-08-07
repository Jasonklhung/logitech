<?php
namespace App\Repositories\back;

use Doctrine\Common\Collections\Collection;
use App\Admin;
use App\Consumer;

class AccountRepository
{
	/* 注入activities model */
	protected $admin;
	protected $consumer;

	public function __construct(Admin $admin,Consumer $consumer)
	{
		$this->admin = $admin;
		$this->consumer = $consumer;
	}

	public function getAccountInfo()
	{
		return $this->admin
				->where('aStatus','Y')
				->get();
	}

	public function InsertAccount($account,$password,$username,$group)
	{
		return $this->admin
				->insert(
					['aAccount' => $account, 
					 'password' => $password,
					 'aUserName' => $username,
					 'aGroup' => $group]
				);
	}

	public function getAccount()
	{
		return $this->admin
				->get();
	}

	public function updatepass($id,$password)
	{
		return $this->admin
				->where('id',$id)
				->update(['password' => $password]);
	}

	public function getConsumer()
	{
		return $this->consumer
				->whereBetween('id', ['214', '400'])
				->get();
	}

	public function updatepass2($id,$password)
	{
		return $this->consumer
				->where('id',$id)
				->update(['password' => $password]);
	}
}


?>