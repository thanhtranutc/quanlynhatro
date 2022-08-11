<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ApartmentRepository;
use App\Repositories\ApartmentroomRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $userRepository;

    protected $apartmentRepository;

    protected $apartmentroomRepository;


    public function __construct(
        UserRepository $userRepository,
        ApartmentRepository $apartmentRepository,
        ApartmentroomRepository $apartmentroomRepository
    ) {
        $this->userRepository = $userRepository;
        $this->apartmentRepository = $apartmentRepository;
        $this->apartmentroomRepository = $apartmentroomRepository;
    }

    public function index()
    {
        $listUser = $this->userRepository->getAllPaginate();
        return view('admin.list_user', compact('listUser'));
    }
}
