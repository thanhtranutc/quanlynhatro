<?php

namespace App\Services;

use App\Repositories\RoomfeeRepository;

class RoomfeeService {

    protected $roomfeeRepository;


    public function __construct(RoomfeeRepository $roomfeeRepository)
    {
        $this->roomfeeRepository = $roomfeeRepository;
    }
 
    public function getTotalPriceByMonth()
    {
        $totalPrice = [0,0,0,0,0,0,0,0,0,0,0,0];
        $month = $this->roomfeeRepository->getMonthHasTurnover();
        $totalTurnover = $this->roomfeeRepository->getTotalPriceByMonth();

        foreach($month as $i=> $value){
            --$value;
            $totalPrice[$value] = $totalTurnover[$i];
        }
        return $totalPrice;
    }

    public function getTotalDebtByMonth()
    {
        $totalDebt = [0,0,0,0,0,0,0,0,0,0,0,0];
        $month = $this->roomfeeRepository->getMonthHasDebt();
        $total = $this->roomfeeRepository->getTotalDebtByMonth();

        foreach($month as $i=> $value){
            --$value;
            $totalDebt[$value] = $total[$i];
        }
        return $totalDebt;
    }
    
}