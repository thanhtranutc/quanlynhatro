<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RoomfeeRepository;

class StatisticController extends Controller
{
    public function __construct(RoomfeeRepository $roomfeeRepository)
    {
        $this->roomfeeRepository = $roomfeeRepository;
    }

    public function index(){
        $totalPrice = [0,0,0,0,0,0,0,0,0,0,0,0];
        $month = $this->roomfeeRepository->getMonthHasTurnover();
        $totalTurnover = $this->roomfeeRepository->getTotalPriceByMonth();

        foreach($month as $i=> $value){
            --$value;
            $totalPrice[$value] = $totalTurnover[$i];
        }
        return response()->json($totalPrice);
    }
}
