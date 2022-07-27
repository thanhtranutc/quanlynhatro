<?php

namespace App\Services;

use App\Repositories\ApartmentRepository;

class ApartmentService {

    protected $apartmentRepository;


    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function search($request){
        $listApartment = $this->apartmentRepository->findByNameAndAdress($request['name'],$request['address']);
        return $listApartment;
    }

}