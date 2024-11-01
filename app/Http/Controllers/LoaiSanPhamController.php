<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    //
    public function index(){
        $dsLoaiSP = LoaiSanPham::all();
        return view("loaisanpham/index")
            ->with("dsLoaiSP", $dsLoaiSP);
    }
    public function create(){
        return view("loaisanpham/create");
    }

    public function save(Request $request){
        $newRecord =  new LoaiSanPham();
        $newRecord->lsp_ten = $request->lsp_ten;
        $newRecord->lsp_mota = $request->lsp_mota;
        $newRecord->save();
        return redirect(route("dsLoaiSP.index"));
    }

    public function delete(Request $request){
        $deleteRecord = LoaiSanPham::find($request->lsp_ma);
        $deleteRecord->delete();
        return redirect(route("dsLoaiSP.index"));
    }

    public function edit(Request $request){
        $editRecord = LoaiSanPham::find($request->lsp_ma);
        return view("loaisanpham/edit")
            ->with("editRecord", $editRecord);
    }

    public function update(Request $request){
        $updateRecord = LoaiSanPham::find($request->lsp_ma);
        $updateRecord->lsp_ten = $request->lsp_ten;
        $updateRecord->lsp_mota = $request->lsp_mota;
        $updateRecord->update();
        return redirect(route("dsLoaiSP.index"));
    }
}
