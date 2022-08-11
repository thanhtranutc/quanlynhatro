<?php

namespace App\Repositories;

use App\Models\Monthlycost;

class MonthlycostRepository {

    protected $monthlycost;


    public function __construct(Monthlycost $monthlycost)
    {
        $this->monthlycost = $monthlycost;
    }

    public function getAll()
    {
       return $this->monthlycost->All();
    }

    public function create(array $attributes){
        return $this->monthlycost->create($attributes);
    }

    public function update($id , array $attribute)
    {
        $room = $this->monthlycost->find($id);
        if($room){
           return $room->update($attribute);
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $result = $this->monthlycost->find($id);
        if($result){
            $result->delete();
            return true;
        }else{
            return false;
        }
    }

    public function findById($id){
        return $this->monthlycost->find($id);
    }
}