<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo = "/";

    public function username(){
        return "kh_tendangnhap";
    }

    // Thông tin dùng để xác minh
    protected function credentials(Request $request)
    {
        $cred = $request->only($this->username(),"kh_matkhau");
        return $cred;
    }

    // Kiểm tra thông tin hợp lệ của dữ liệu khi xác thực tai f khoản
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => "required|string",
            "kh_matkhau" => "required|string"
            ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
    }

    public function index(){
        return view("auth/login/index");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route("frontend.home.index"));
    }
}
