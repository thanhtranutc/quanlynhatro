<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoomfeeRepository;
use App\Services\RoomfeeService;

class StatisticController extends Controller
{
    protected $roomfeeRepository;

    protected $roomfeeService;

    public function __construct(
        RoomfeeRepository $roomfeeRepository,
        RoomfeeService $roomfeeService
        )
    {
        $this->roomfeeRepository = $roomfeeRepository;
        $this->roomfeeService = $roomfeeService;
    }

    public function statistic()
    {
        $totalDebt = $this->roomfeeService->getTotalDebtByMonth();
        $totalPrice = $this->roomfeeService->getTotalPriceByMonth();
        $listRoom = $this->roomfeeRepository->getRoomDebt();
        return view('statistic.view',compact('listRoom','totalPrice','totalDebt'));
    }

    public function statisticUser()
    {
        return view('user.statistic');
    }
}
