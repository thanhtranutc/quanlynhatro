<?php

namespace App\Http\Controllers;

use App\Repositories\ApartmentRepository;
use App\Services\ApartmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    protected $apartmentRepository;
    protected $apartmentService;

    public function __construct(
        ApartmentRepository $apartmentRepository,
        ApartmentService $apartmentService
    ) {
        $this->apartmentRepository = $apartmentRepository;
        $this->apartmentService = $apartmentService;
    }
    public function listApartment()
    {
        $listApartment = $this->apartmentRepository->getAll();
        return view('apartments.list', ['listApartment' => $listApartment]);
    }

    public function search(Request $request)
    {
        $listApartment = $this->apartmentService->search($request->all());
        return view('apartments.resultsearch', ['listApartment' => $listApartment]);
    }

    public function showAddApartmentForm()
    {
        return view('apartments.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);
        $image = $request->file('image');
        $imageName = '';
        if ($image) {
            $storedPath = $image->move('img/apartment', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
        }
        $newApartment = [
            'name' => $request->name,
            'address' => $request->address,
            'image' => $imageName,
        ];
        $this->apartmentRepository->create($newApartment);
        return Redirect::to('list-apartment');
    }

    public function deleteApartment($id)
    {
        $this->apartmentRepository->delete($id);
        return redirect()->back();
    }

    public function editApartment($id)
    {
        $apartment = $this->apartmentRepository->findById($id);
        return view('apartments.edit', ['apartment' => $apartment]);
    }

    public function updateApartment($id, Request $request)
    {
        $image = $request->file('image');
        $apartment = [
            'name' => $request->name,
            'address' => $request->address,
        ];
        if ($image) {
            $storedPath = $image->move('img/apartment', $image->getClientOriginalName());
            $apartment['image'] = $image->getClientOriginalName();
        }
        $this->apartmentRepository->update($id, $apartment);
        return Redirect::to('list-apartment');
    }
}
