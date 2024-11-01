<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    //
    public function index(Request $request){
        if ($request->session()->has("gioHangData")) {
            $gioHangData = $request->session()->get('gioHangData');
        } else {
            $gioHangData = [];
        }
        return view("frontend/giohang/index")
            ->with("gioHangData", $gioHangData);
    }

    public function create(Request $request)
    {
        if ($request->session()->has("gioHangData")) {
            $gioHangData = $request->session()->get('gioHangData');
        } else {
            $gioHangData = [];
        }
        $sp = SanPham::find($request->sp_ma);
        $sp_ma = $sp->sp_ma;
        $sp_ten = $sp->sp_ten;
        $sp_gia = $sp->sp_gia;
        $sp_soluong = $request->sp_soluong;

        if (count($sp->dsHinhSP) > 0) {
            $sp_hinh = "/storage/uploads/" . $sp->dsHinhSP[0]->hsp_tentaptin;
        } else {
            $sp_hinh = asset('assets/img/dft-img.jpg');
        }

        $gioHangData[$sp_ma] = [
            "sp_ma" => $sp_ma,
            "sp_ten" => $sp_ten,
            "sp_gia" => $sp_gia,
            "sp_hinh" => $sp_hinh,
            "sp_soluong" => $sp_soluong
        ];

        // Lưu thông tin vào session ở trong storage/framework/sessions
        $request->session()->put('gioHangData', $gioHangData);

        return redirect(route('frontend.home.index'));
    }

    public function delete(Request $request){
        if ($request->session()->has('gioHangData')){
            $gioHangData = $request->session()->get('gioHangData');
            unset($gioHangData[$request->sp_ma]);
            $request->session()->put('gioHangData', $gioHangData);
        }
        return redirect(route('frontend.giohang.index'));
    }
}
