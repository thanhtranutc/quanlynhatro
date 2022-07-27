<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApartmentroomRepository;
use App\Repositories\ApartmentRepository;
use Illuminate\Support\Facades\Redirect;

class ApartmentRoomController extends Controller
{
    protected $apartmentroomRepository;
    protected $apartmentRepository;

    public function __construct(
        ApartmentroomRepository $apartmentroomRepository,
        ApartmentRepository $apartmentRepository
    ) {
        $this->apartmentroomRepository = $apartmentroomRepository;
        $this->apartmentRepository = $apartmentRepository;
    }

    public function listRoom()
    {
        $listRoom = $this->apartmentroomRepository->getAllPaginate();
        return view('apartment_room.list', ['listRoom' => $listRoom]);
    }
    public function viewRoom($id)
    {
    }
    public function addRoom()
    {
        $listApartment = $this->apartmentRepository->getApartmentList();
        return view('apartment_room.add', ['listApartment' => $listApartment]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'room_number' => 'required',
        ]);
        $image = $request->file('image');
        $imageName = '';
        if ($image) {
            $storedPath = $image->move('img/apartment_room', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
        }
        $newRoom = [
            'room_number' => $request->room_number,
            'price' => $request->price,
            'tenant_number' => $request->number_tenant,
            'apartment_id' => $request->apartment,
            'room_image' => $imageName,
        ];
        $this->apartmentroomRepository->create($newRoom);
        return Redirect::to('list-room');
    }
    public function deleteRoom($id)
    {
        $this->apartmentroomRepository->delete($id);
        return redirect()->back();
    }

    public function editRoom($id)
    {
        $room = $this->apartmentroomRepository->findById($id);
        $listApartment = $this->apartmentRepository->getApartmentList();
        return view('apartment_room.edit', ['room' => $room, 'listApartment' => $listApartment]);
    }

    public function updateRoom($id, Request $request)
    {
        $request->validate([
            'room_number' => 'required'
        ]);
        $image = $request->file('image');

        $room = [
            'room_number' => $request->room_number,
            'price' => $request->price,
            'tenant_number' => $request->number_tenant,
            'apartment_id' => $request->apartment,
        ];
        if ($image) {
            $storedPath = $image->move('img/apartment_room', $image->getClientOriginalName());
            $room['room_image'] = $image->getClientOriginalName();
        }
        $this->apartmentroomRepository->update($id, $room);
        return Redirect::to('list-room');
    }

    public function search(Request $request)
    {
        $apartment = $this->apartmentRepository->findByName($request->apartment);
        foreach($apartment as $value){
           $idApartment[] = $value->id; 
        }
        $result = $this->apartmentroomRepository->search($request->room_number, $idApartment);
        return view('apartment_room.resultsearch',compact('result')); 
    }
}
