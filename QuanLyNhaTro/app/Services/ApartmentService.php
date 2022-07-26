<?php

namespace App\Services;

use App\Repositories\ApartmentRepository;
use App\Models\Apartment;

class ApartmentService {

    protected $apartmentRepository;


    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function search($request){
        $dataPost = $request;
        $listApartment = Apartment::orderBy('id','asc');
        if(!empty($dataPost['name'])){
            $listApartment = $listApartment->where('name','LIKE', '%' . $dataPost['name'] . '%');
        }
        if(!empty($dataPost['address'])){
            $listApartment = $listApartment->where('address','LIKE', '%' . $dataPost['address'] . '%');
        }
        $listApartment = $listApartment->get();
        return $listApartment;
    }


}