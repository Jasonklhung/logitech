<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\MemberRepository;
use Carbon\Carbon;

class MemberController extends Controller
{
	protected $memberRepository;

    public function __construct(MemberRepository $memberRepository)
    {
    	$this->memberRepository = $memberRepository;
    }

    public function member()
    {
    	return view('back.member.member');
    }

    public function memeberInfo($id)
    {
    	$today = Carbon::now()->format('Y-m-d');

    	$member = $this->memberRepository
    			->getMemberInfo($id);

    	return view('back.member.member-info',compact('member','today'));
    }
}
