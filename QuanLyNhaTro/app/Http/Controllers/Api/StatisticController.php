<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoomfeeService;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    protected $roomfeeService;

    public function __construct(
        RoomfeeService $roomfeeService
        )
    {
        $this->roomfeeService = $roomfeeService;
    }

    public function index(){
        $totalDebt = $this->roomfeeService->getTotalDebtByMonth();
        $totalPrice = $this->roomfeeService->getTotalPriceByMonth();
        return response()->json(['totalPrice'=>$totalPrice,'totalDebt'=>$totalDebt]);
    }

    public function getStatisticByUser()
    {
        $userCurrent = auth()->user()->id;  
        $statistic = $this->roomfeeService->getStatisticByUser($userCurrent);
        $totalDebt = $this->roomfeeService->getTotalDebtByUser($userCurrent);
        return response()->json(['statistic'=>$statistic,'totalDebt'=>$totalDebt]);
    }
    
}
