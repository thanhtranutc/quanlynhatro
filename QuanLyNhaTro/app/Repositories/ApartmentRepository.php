<?php

namespace App\Repositories;

use App\Models\Apartment;

class ApartmentRepository {

    protected $apartment;


    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    public function create(array $attributes){
        return $this->apartment->create($attributes);
    }

    public function getAll()
    {
       return $this->apartment->orderby('id','asc')->paginate(5);
    }

    public function delete($id)
    {
        $result = $this->apartment->find($id);
        if($result){
            $result->delete();
            return true;
        }else{
            return false;
        }
    }

    public function findById($id)
    {
       return $this->apartment->find($id);
    }

    public function update($id , array $attribute)
    {
        $apartment = $this->apartment->find($id);
        if($apartment){
           return $apartment->update($attribute);
        }else{
            return false;
        }
    }

    public function findByNameAndAdress($name,$address){
        $listApartment = $this->apartment->orderby('id','asc');
        if(!empty($name)){
            $listApartment = $listApartment->where('name','LIKE', '%' . $name . '%');
        }
        if(!empty($address)){
            $listApartment = $listApartment->where('address','LIKE', '%' . $address . '%');
        }
        $listApartment = $listApartment->get();
        return $listApartment;

    }

   
}