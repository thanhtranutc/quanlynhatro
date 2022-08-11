<?php

namespace App\Repositories;

use App\Models\Room_fee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoomfeeRepository {

    protected $room_fee;


    public function __construct(Room_fee $room_fee)
    {
        $this->room_fee = $room_fee;
    }

    public function getAll()
    {
        return $this->room_fee->All();
    }

    public function findByApartmentId($id)
    {
        return $this->room_fee->where('apartment_room_id',$id)->get();
    }

    public function create(array $attributes){
        return $this->room_fee->create($attributes);
    }

    public function findById($id)
    {
        return $this->room_fee->find($id);
    }

    public function update($id , array $attribute)
    {
        $receipt = $this->room_fee->find($id);
        if($receipt){
           return $receipt->update($attribute);
        }else{
            return false;
        }
    }

    public function getRoomDebt()
    {
        return $this->room_fee->whereColumn('total_paid','<','total_price')->get();
    }

    public function getRoomDebtLastMonth(){
        return $this->room_fee->whereColumn('total_paid','<','total_price')
        ->whereMonth('charge_date',Carbon::now()->subMonth()->month)
        ->get();
    }

    public function getMonthHasTurnover()
    {
        $month = $this->room_fee->selectRaw('Month(charge_date) as month')
        ->whereYear('charge_date',date('Y'))
        ->groupBy(DB::Raw('Month(charge_date)'))
        ->pluck('month');
        return $month;
    }

    public function getTotalPriceByMonth()
    {
        $totalPrice = $this->room_fee->selectRaw('sum(total_price) as total')
         ->whereYear('charge_date',date('Y'))
         ->groupBy(DB::Raw('Month(charge_date)'))
         ->pluck('total');
         return $totalPrice;
    }

    public function getMonthHasDebt()
    {
        $month = $this->room_fee->selectRaw('Month(charge_date) as month')
        ->whereYear('charge_date',date('Y'))
        ->whereColumn('total_paid','<','total_price')
        ->groupBy(DB::Raw('Month(charge_date)'))
        ->pluck('month');
        return $month;
    }

    public function getTotalDebtByMonth()
    {
        $totalDebt = $this->room_fee->selectRaw('sum(total_price - total_paid) as total')
         ->whereYear('charge_date',date('Y'))
         ->whereColumn('total_paid','<','total_price')
         ->groupBy(DB::Raw('Month(charge_date)'))
         ->pluck('total');
         return $totalDebt;
    }

    public function getTotalPriceByApartmentId($id)
    {
        $month = $this->room_fee->selectRaw('Month(charge_date) as month,sum(total_price) as total')
        ->whereYear('charge_date',date('Y'))
        ->whereIn('apartment_room_id',$id)
        ->groupBy(DB::Raw('Month(charge_date)'))
        ->pluck('total','month');
        return $month;
    }

    public function getTotalDebtByApartmentId($id)
    {
        $month = $this->room_fee->selectRaw('Month(charge_date) as month,sum(total_price - total_paid) as total')
        ->whereYear('charge_date',date('Y'))
        ->whereIn('apartment_room_id',$id)
        ->whereColumn('total_paid','<','total_price')
        ->groupBy(DB::Raw('Month(charge_date)'))
        ->pluck('total','month');
        return $month;
    }

}