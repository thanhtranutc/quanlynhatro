<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ApartmentroomRepository;
use App\Repositories\RoomfeeRepository;
use App\Repositories\TenantcontractRepository;
use Illuminate\Support\Facades\Redirect;

class RoomfeeController extends Controller
{
    protected $apartmentroomRepository;
    protected $roomfeeRepository;
    protected $tenantcontractRepository;

    public function __construct(
        ApartmentroomRepository $apartmentroomRepository,
        RoomfeeRepository $roomfeeRepository,
        TenantcontractRepository $tenantcontractRepository
    ) {
        $this->apartmentroomRepository = $apartmentroomRepository;
        $this->roomfeeRepository = $roomfeeRepository;
        $this->tenantcontractRepository = $tenantcontractRepository;
    }
    public function listRoom()
    {
        $listRoom = $this->apartmentroomRepository->getAll();
        return view('room_fee.list', compact('listRoom'));
    }

    public function listReceipt($id)
    {
        $listReceipt = $this->roomfeeRepository->findByApartmentId($id);
        return view('room_fee.list_receipt', compact('listReceipt'));
    }

    public function addReceipt($id)
    {
        return view('room_fee.add', compact('id'));
    }

    public function saveReceipt(Request $request, $id)
    {
        $request->validate([
            'electricity_number' => 'required',
            'water_number' => 'required',
            'total' => 'required',
            'total_price' => 'required',
            'charge_date' => 'required',
        ]);

        $newReceipt = [
            'electricity_number' => $request->electricity_number,
            'water_number' => $request->water_number,
            'total_price' => $request->total,
            'total_paid' => $request->total_price,
            'charge_date' => $request->charge_date,
            'apartment_room_id' => $id
        ];
        $contractCurrent = $this->tenantcontractRepository->getContractByTime($request->charge_date, $id);
        if ($contractCurrent) {
            $newReceipt['tenant_id'] = $contractCurrent->tenant_id;
            $this->roomfeeRepository->create($newReceipt);
            return Redirect::route('receipt.list', $id);
        } else {
            return Redirect::back()->withErrors(['msg' => 'Tháng hiện tại không có người thuê']);
        }
    }

    public function editReceipt($id)
    {
        $receiptCurrent = $this->roomfeeRepository->findById($id);
        return view('room_fee.edit', compact('receiptCurrent'));
    }
    public function updateReceipt($id, Request $request)
    {
        $request->validate([
            'electricity_number' => 'required',
            'water_number' => 'required',
            'total' => 'required',
            'total_price' => 'required',
        ]);

        $receiptCurrent = $this->roomfeeRepository->findById($id);
        if ($receiptCurrent) {
            $receipt = [
                'electricity_number' => $request->electricity_number,
                'water_number' => $request->water_number,
                'total_price' => $request->total,
                'total_paid' => $request->total_price,
            ];
            $this->roomfeeRepository->update($id,$receipt);
        }
        return redirect()->back();
    }
}
