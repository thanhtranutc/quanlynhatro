<?php

namespace App\Repositories;

use App\Models\Room_fee;
use Carbon\Carbon;

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

}