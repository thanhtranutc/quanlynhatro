<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MonthlycostRepository;
use Illuminate\Support\Facades\Redirect;

class MonthlyCostController extends Controller
{

    protected $monthlycostRepository;

    public function __construct(MonthlycostRepository $monthlycostRepository)
    {
        $this->monthlycostRepository = $monthlycostRepository;
    }

    public function index()
    {
        $listMonthlyCost = $this->monthlycostRepository->getAll();
        return view('monthly_cost.view', compact('listMonthlyCost'));
    }

    public function add()
    {
        return view('monthly_cost.add');
    }

    public function save(Request $request)
    {
        $newMonthlyCost = [
            'name' => $request->name
        ];
        $this->monthlycostRepository->create($newMonthlyCost);
        return Redirect::to('/monthly-cost');
    }

    public function delete($id)
    {
        $this->monthlycostRepository->delete($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $monthlyCost = $this->monthlycostRepository->findById($id);
        return view('monthly_cost.edit',compact('monthlyCost'));
    }

    public function update($id, Request $request){
        $monthlyCost = [
            'name' => $request->name
        ];
        $this->monthlycostRepository->update($id,$monthlyCost);
        return Redirect::to('/monthly-cost');
    }
}
