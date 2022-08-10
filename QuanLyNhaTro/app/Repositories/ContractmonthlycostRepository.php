<?php

namespace App\Repositories;

use App\Models\ContractMonthlyCost;

class ContractmonthlycostRepository {

    protected $contractMonthlyCost;


    public function __construct(ContractMonthlyCost $contractMonthlyCost)
    {
        $this->contractMonthlyCost = $contractMonthlyCost;
    }

    public function getAll()
    {
       return $this->contractMonthlyCost->All();
    }

    public function create(array $attributes){
        return $this->contractMonthlyCost->create($attributes);
    }

    public function update($id , array $attribute)
    {
        $room = $this->contractMonthlyCost->find($id);
        if($room){
           return $room->update($attribute);
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $result = $this->contractMonthlyCost->find($id);
        if($result){
            $result->delete();
            return true;
        }else{
            return false;
        }
    }

    public function findById($id){
        return $this->contractMonthlyCost->find($id);
    }
}