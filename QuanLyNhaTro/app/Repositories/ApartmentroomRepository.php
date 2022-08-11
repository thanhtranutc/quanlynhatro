<?php

namespace App\Repositories;

use App\Models\Apartmentroom;

class ApartmentroomRepository {

    protected $apartmentroom;


    public function __construct(Apartmentroom $apartmentroom)
    {
        $this->apartmentroom = $apartmentroom;
    }

    public function getAll()
    {
       return $this->apartmentroom->All();
    }

    public function create(array $attributes){
        return $this->apartmentroom->create($attributes);
    }

    public function update($id , array $attribute)
    {
        $room = $this->apartmentroom->find($id);
        if($room){
           return $room->update($attribute);
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $result = $this->apartmentroom->find($id);
        if($result){
            $result->delete();
            return true;
        }else{
            return false;
        }
    }

    public function findById($id)
    {
        return $this->apartmentroom->find($id);
    }

    public function search($id,array $apartment_id){
         $listRoom = $this->apartmentroom->orderby('id','asc');
         if(!empty($id)){
            $listRoom = $listRoom->where('room_number',$id);
         }
         if(!empty($apartment_id)){
            $listRoom = $listRoom->wherein('apartment_id',$apartment_id);
         }
         $listRoom=$listRoom->get();
         return $listRoom;
    }

    public function getAllPaginate(){
        return $this->apartmentroom->orderby('id','asc')->paginate(5);
    }

    public function getCountRoomByApartmentId($id)
    {
       $listRoom = $this->apartmentroom->where('apartment_id',$id)->get();
       return count($listRoom);
    }

    public function getListRoomByListApartment($list)
    {
        return $this->apartmentroom->whereIn('apartment_id',$list)->get();
    }

}