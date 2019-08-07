<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\back\TypeRepository;
use Carbon\Carbon;

class TypeController extends Controller
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
    	$this->typeRepository = $typeRepository;
    }

    public function type()
    {

    	$today = Carbon::now()->format('Y-m-d');

    	$siders = $this->typeRepository
    				->getSiders($today);

    	$activity = $this->typeRepository
    				->getAllActivity($today);

    	return view('back.type.type',compact('siders','activity'));
    }
}
