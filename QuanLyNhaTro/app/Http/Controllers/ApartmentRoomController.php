<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApartmentroomRepository;
use App\Repositories\ApartmentRepository;
use App\Repositories\TenantcontractRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Redirect;
use App\Events\CreateApartmentRoom;
use Illuminate\Support\Facades\Event;

class ApartmentRoomController extends Controller
{
    protected $apartmentroomRepository;
    protected $apartmentRepository;
    protected $tenantcontractRepository;
    protected $tenantRepository;

    public function __construct(
        ApartmentroomRepository $apartmentroomRepository,
        ApartmentRepository $apartmentRepository,
        TenantcontractRepository $tenantcontractRepository,
        TenantRepository $tenantRepository
    ) {
        $this->apartmentroomRepository = $apartmentroomRepository;
        $this->apartmentRepository = $apartmentRepository;
        $this->tenantcontractRepository = $tenantcontractRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function listRoom()
    {
        $listRoom = $this->apartmentroomRepository->getAllPaginate();
        return view('apartment_room.list', ['listRoom' => $listRoom]);
    }

    public function viewRoom($id)
    {
        $contractCurrent = $this->tenantcontractRepository->getContractByApartmentId($id);
        if($contractCurrent){
            $tenantCurrent = $this->tenantRepository->findById($contractCurrent->tenant_id);
            return view('apartment_room.view',compact('tenantCurrent','id'));
        }else{
            return view('apartment_room.view',compact('id'));
        }
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
        Event::dispatch(new CreateApartmentRoom());
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
    
    public function showFormAddContract($id)
    {
        $listTenant = $this->tenantRepository->getAll();
        return view('apartment_room.addcontract',compact('id','listTenant'));
    }
    public function addContract(Request $request,$id)
    {
        $request->validate([
            'phone' => 'required'
        ]);
        $newContract = [
            'apartment_room_id' => $id,
            'start_date' => $request->start,
            'end_date' => $request->end,
            'price' => $request->price,
            'water_price' => $request->price_water,
            'electricity_price' => $request->price_electricity,
            'note' => $request->note,
            'electricity_pay_type' => $request->electricity_pay_type,
        ];
        $checkTenant = $this->tenantRepository->findByPhone($request->phone);
        if(empty($checkTenant)){
            $newTenant = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
            ];
            $newTenant = $this->tenantRepository->create($newTenant);
            $newContract['tenant_id'] = $newTenant->id;
        }else{
            $newContract['tenant_id'] = $checkTenant->id;
        }
        $this->tenantcontractRepository->create($newContract);
        return Redirect::to('/list-room');
    }
}
