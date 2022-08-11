<?php

namespace App\Services;

use App\Repositories\RoomfeeRepository;
use App\Repositories\ApartmentRepository;
use App\Repositories\ApartmentroomRepository;
use Illuminate\Support\Facades\Auth;

class RoomfeeService {

    protected $roomfeeRepository;

    protected $apartmentRepository;

    protected $apartmentroomRepository;


    public function __construct(
        RoomfeeRepository $roomfeeRepository,
        ApartmentroomRepository $apartmentroomRepository,
        ApartmentRepository $apartmentRepository
        )
    {
        $this->roomfeeRepository = $roomfeeRepository;
        $this->apartmentRepository = $apartmentRepository;
        $this->apartmentroomRepository = $apartmentroomRepository;
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

    public function getStatisticByUser($id)
    {
        $totalPrice = [0,0,0,0,0,0,0,0,0,0,0,0];
        $listApartment = $this->apartmentRepository->getApartmentByUserId($id)->pluck('id');
        $listRoom = $this->apartmentroomRepository->getListRoomByListApartment($listApartment)->pluck('id');
        $statistic = $this->roomfeeRepository->getTotalPriceByApartmentId($listRoom);
        foreach($statistic as $key=> $value){
            --$key;
            $totalPrice[$key] = $value;
        }
        return $totalPrice;
        
    }

    public function getTotalDebtByUser($id){
        $totalDebt = [0,0,0,0,0,0,0,0,0,0,0,0];
        $listApartment = $this->apartmentRepository->getApartmentByUserId($id)->pluck('id');
        $listRoom = $this->apartmentroomRepository->getListRoomByListApartment($listApartment)->pluck('id');
        $statistic = $this->roomfeeRepository->getTotalDebtByApartmentId($listRoom);
        foreach($statistic as $key=> $value){
            --$key;
            $totalDebt[$key] = $value;
        }
        return $totalDebt;
    }
    
}