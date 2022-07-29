<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoomfeeRepository;

class StatisticController extends Controller
{
    protected $roomfeeRepository;

    public function __construct(RoomfeeRepository $roomfeeRepository)
    {
        $this->roomfeeRepository = $roomfeeRepository;
    }

    public function statistic()
    {
        $listRoom = $this->roomfeeRepository->getRoomDebt();
        return view('statistic.view',compact('listRoom'));
    }
}
