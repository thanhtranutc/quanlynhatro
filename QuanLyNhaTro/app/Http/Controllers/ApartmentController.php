<?php

namespace App\Http\Controllers;

use App\Repositories\ApartmentRepository;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected $apartmentRepository;

    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }
    public function listApartment()
    {
        $listApartment = $this->apartmentRepository->getAll();
        return view('apartments.list',['listApartment'=>$listApartment]);
    }
}
