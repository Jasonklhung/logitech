<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AwardRepository;
use Carbon\Carbon;

class AwardController extends Controller
{
    protected $awardRepository;

    public function __construct(AwardRepository $awardRepository)
    {
    	$this->awardRepository = $awardRepository;
    }

    public function searchAward(Request $request)
    {
    	$today = Carbon::now()->format('Y-m-d');
    	$date = $request->date;

    	$award = $this->awardRepository
    			->searchAward($date,$today);

    	return $award;
    }
}
