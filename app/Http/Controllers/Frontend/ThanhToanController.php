<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DonDatHang;
use App\Models\HinhThucThanhToan;
use App\Models\KhachHang;
use App\Models\SanPham_DonDatHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    //
    public function index(Request $request)
    {
        $dsHttt = HinhThucThanhToan::all();
        if ($request->session()->has("gioHangData")) {
            $gioHangData = $request->session()->get('gioHangData');
        } else {
            $gioHangData = [];
        }
        return view("frontend/thanhtoan/index")
            ->with("dsHttt", $dsHttt);
    }

    public function confirm(Request $request)
    {


        if (!$request->has('kh_cu') || empty($request->kh_tendangnhap)) {
            $newKH = new KhachHang();
            $newKH->kh_tendangnhap = $request->kh_tendangnhap;
            $newKH->kh_matkhau = bcrypt($request->kh_matkhau); //mã hoá mật khẩu
            $newKH->kh_dienthoai = $request->kh_dienthoai;
            $newKH->kh_diachi = $request->kh_diachi;
            $newKH->kh_email = $request->kh_email;
            $newKH->kh_ten = $request->kh_ten;
            $newKH->kh_gioitinh = $request->kh_gioitinh;

            $ngaysinh = Carbon::parse($request->kh_ngaysinh);
            $newKH->kh_ngaysinh = $ngaysinh->day;
            $newKH->kh_thangsinh = $ngaysinh->month;
            $newKH->kh_namsinh = $ngaysinh->year;
            $newKH->kh_makichhoat = md5(date("YmdHis", $request->kh_makichhoat));
            $newKH->kh_trangthai = 0;
            $newKH->kh_quantri = 0;
            $newKH->save();
        }

        $newDdh = new DonDatHang();
        $newDdh->dh_ngaylap = date('Y-m-d H-i-s');
        $newDdh->dh_ngaygiao = $request->dh_ngaygiao;
        $newDdh->dh_noigiao = $request->dh_noigiao;
        $newDdh->dh_trangthaithanhtoan = 0;
        $newDdh->httt_ma = $request->httt_ma;
        $newDdh->kh_tendangnhap = $request->kh_tendangnhap;
        $newDdh->save();

        for ($i = 0; $i < count($request->sp_ma); $i++) {
            $newChiTiet = new SanPham_DonDatHang();
            $newChiTiet->sp_ma = $request->sp_ma[$i];
            $newChiTiet->dh_ma = $newDdh->dh_ma;
            $newChiTiet->sp_dh_soluong = $request->sp_dh_soluong[$i];
            $newChiTiet->sp_dh_dongia = $request->sp_dh_gia[$i];
            $newChiTiet->save();
        }
        $request->session()->put('gioHangData', []);

        return redirect(route('frontend.thanhtoan.succOrder'));
    }

    public function succOrder()
    {
        return view('frontend/thanhtoan/succOrder');
    }
}
