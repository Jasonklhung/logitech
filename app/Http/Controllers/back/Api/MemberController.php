<?php

namespace App\Http\Controllers\back\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\MemberRepository;

class MemberController extends Controller
{
	protected $memberRepository;

	public function __construct(MemberRepository $memberRepository)
    {
    	$this->memberRepository = $memberRepository;
    }

    public function memberTable()
    {
    	$member = $this->memberRepository
    			->getMemeberData();

    	return $member;
    }

    public function memberTableSearch(Request $request)
    {
    	$start = $request->start;
    	$end = $request->end;

    	$member = $this->memberRepository
    			->getMemberSearch($start,$end);

    	return $member;
    }
}
