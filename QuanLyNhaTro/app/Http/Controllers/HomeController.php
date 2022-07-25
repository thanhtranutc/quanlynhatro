<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $userName = Auth::user()->name;
            return view('index', ['user_name' => $userName]);
        } else {
            return Redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function register(Request $request)
    {
        $dataPost = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);
        $checkUser = $this->userRepository->findByEmail($dataPost['email']);
        if (empty($checkUser)) {
            $newUser = [
                'name' =>  $dataPost['name'],
                'email' =>  $dataPost['email'],
                'password' =>  bcrypt($dataPost['name']),
            ];
            $this->userRepository->create($newUser);
            $user = $this->userRepository->findByEmail($dataPost['email']);
            Auth::login($user);
            return view('index', ['user_name' => $dataPost['name']]);
        } else {
            Session::put('message', 'Email này đã có người đăng ký!');
            return redirect()->back();
        }
    }

    public function showResetPasswordPage()
    {
        return view('auth.email');
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('auth.verify', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function showFormReset($token)
    {
        return view('auth.resetpassword', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $dataPost = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $passwordNew = [
            'password' => Hash::make($dataPost['password']),
        ];
        $this->userRepository->update($dataPost['email'],$passwordNew);
        DB::table('password_resets')->where(['email'=> $dataPost['email']])->delete();
        return view('auth.login',['message'=>'Đổi mật khẩu thành công']);

    }
}
