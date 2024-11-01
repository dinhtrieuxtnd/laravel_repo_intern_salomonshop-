<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    public function index(){
        $dssp = SanPham::all();

        return view("sanpham/index")
            ->with("dssp", $dssp);
    }

    public function create(){
        $dsLsp = LoaiSanPham::all();
        $dsNsx = NhaSanXuat::all();
        $dsKm = KhuyenMai::all();
        return view("sanpham/create")
            ->with("dsLsp", $dsLsp)
            ->with("dsNsx", $dsNsx)
            ->with("dsKm", $dsKm);
    }

    public function save(Request $request){
        $newRecord = new SanPham();
        $newRecord->sp_ten = $request->sp_ten;
        $newRecord->sp_gia = $request->sp_gia;
        $newRecord->sp_giacu = $request->sp_giacu;
        $newRecord->sp_mota_ngan = $request->sp_mota_ngan;
        $newRecord->sp_mota_chitiet = $request->sp_mota_chitiet;
        $newRecord->sp_ngaycapnhat = $request->sp_ngaycapnhat;
        $newRecord->sp_soluong = $request->sp_soluong;
        $newRecord->lsp_ma = $request->lsp_ma;
        $newRecord->nsx_ma = $request->nsx_ma;
        $newRecord->km_ma = $request->km_ma;
        $newRecord->save();
        return redirect(route("sp.index"));
    }

    public function delete(Request $request){
        $deleteRecord = SanPham::find($request->sp_ma);
        $deleteRecord->delete();
        return redirect(route("sp.index"));
    }

    public function edit(Request $request){
        $editRecord = SanPham::find($request->sp_ma);
        $dsLsp = LoaiSanPham::all();
        $dsNsx = NhaSanXuat::all();
        $dsKm = KhuyenMai::all();
        return view("sanpham/edit")
            ->with("editRecord", $editRecord)
            ->with("dsLsp", $dsLsp)
            ->with("dsNsx", $dsNsx)
            ->with("dsKm", $dsKm);
    }

    public function update(Request $request){
        $updateRecord = SanPham::find($request->sp_ma);
        $updateRecord->sp_ten = $request->sp_ten;
        $updateRecord->sp_gia = $request->sp_gia;
        $updateRecord->sp_giacu = $request->sp_giacu;
        $updateRecord->sp_mota_ngan = $request->sp_mota_ngan;
        $updateRecord->sp_mota_chitiet = $request->sp_mota_chitiet;
        $updateRecord->sp_ngaycapnhat = $request->sp_ngaycapnhat;
        $updateRecord->sp_soluong = $request->sp_soluong;
        $updateRecord->lsp_ma = $request->lsp_ma;
        $updateRecord->nsx_ma = $request->nsx_ma;
        $updateRecord->km_ma = $request->km_ma;
        $updateRecord->update();
        return redirect(route("sp.index"));
    }
}
