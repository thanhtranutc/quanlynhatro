<?php

namespace App\Repositories;

use App\Models\Room_fee;

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

}