<?php

namespace App\Http\Controllers;

use App\Events\CreateApartment;
use App\Events\CreateApartmentRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Spatie\Activitylog\Models\Activity;
use App\Models\Apartment; 
use App\Models\Apartmentroom; 

class EventController extends Controller
{
    protected $apartment;

    protected $apartmentroom;

    public function __construct(
        Apartment $apartment,
        Apartmentroom $apartmentroom
        )
    {
        $this->apartment = $apartment;
        $this->apartmentroom = $apartmentroom;
    }
    public function addApartment(Request $request)
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
        Event::dispatch(new CreateApartment($newApartment));
        activity()->causedBy(auth()->user())->performedOn($this->apartment)->log('Đã thêm 1 tòa nhà');
        return Redirect::to('list-apartment');
    }

    public function addApartmentRoom(Request $request)
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
        Event::dispatch(new CreateApartmentRoom($newRoom));
        activity()->causedBy(auth()->user())->performedOn($this->apartmentroom)->log('Đã thêm 1 phòng trọ');
        return Redirect::to('list-room');
    }
}
