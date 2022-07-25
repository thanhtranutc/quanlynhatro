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
       return $this->apartment->All();
    }

}