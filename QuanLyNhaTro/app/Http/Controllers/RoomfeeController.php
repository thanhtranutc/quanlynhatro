<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApartmentroomRepository;
use App\Repositories\RoomfeeRepository;

class RoomfeeController extends Controller
{
    protected $apartmentroomRepository;
    protected $roomfeeRepository;

    public function __construct(
        ApartmentroomRepository $apartmentroomRepository,
        RoomfeeRepository $roomfeeRepository
        )
    {
        $this->apartmentroomRepository = $apartmentroomRepository;
        $this->roomfeeRepository = $roomfeeRepository;
    }
    public function listRoom()
    {
        $listRoom = $this->apartmentroomRepository->getAll();
        return view('room_fee.list',compact('listRoom'));
    }

    public function listReceipt($id)
    {
        $listReceipt = $this->roomfeeRepository->findByApartmentId($id);
        return view('room_fee.list_receipt',compact('listReceipt'));
    }

    public function addReceipt($id)
    {
        return view('room_fee.add',compact('id'));
    }
}
