<?php

namespace App\Http\Controllers;

use App\Models\HinhSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Storage;

class HinhSanPhamController extends Controller
{
    //
    public function index()
    {
        $dsHsp = HinhSanPham::all();
        $dsSp = SanPham::all();
        return view("hinhsanpham/index")
            ->with("dsHsp", $dsHsp)
            ->with("dsSp", $dsSp);
    }
    public function create()
    {
        $dsSP = SanPham::all();
        return view("hinhsanpham/create")
            ->with("dsSP", $dsSP);
    }

    public function save(Request $request)
    {
        $sp_ma = $request->sp_ma;

        if ($request->hasFile("hsp_taptin")) {
            $fileUpLoaded = $request->hsp_taptin;

            $date = date("Ymd_His");
            $name = $fileUpLoaded->getClientOriginalName();
            $newName = $date . "_" . $name;
            $fileUpLoaded->storeAs("public/uploads", $newName);

            $newRecord = new HinhSanPham();
            $newRecord->sp_ma = $sp_ma;
            $newRecord->hsp_tentaptin = $newName;
            $newRecord->save();
        }
        return redirect(route("hsp.index"));
    }

    public function delete(Request $request)
    {
        $deleteRecord = HinhSanPham::find($request->hsp_ma);
        Storage::delete('public/uploads/' . $deleteRecord->hsp_tentaptin);
        $deleteRecord->delete();
        return redirect(route("hsp.index"));
    }

    public function edit(Request $request)
    {
        $dsSp = SanPham::all();
        $editRecord = HinhSanPham::find($request->hsp_ma);
        return view("hinhsanpham/edit")
            ->with("editRecord", $editRecord)
            ->with("dsSp", $dsSp);
    }

    public function update(Request $request)
    {
        $updateRecord = HinhSanPham::find($request->hsp_ma);
        $updateRecord->sp_ma = $request->sp_ma;

        if ($request->hasFile("hsp_taptin")) {
            Storage::delete('public/uploads/' . $updateRecord->hsp_tentaptin);

            $fileUpLoaded = $request->hsp_taptin;

            $date = date("Ymd_His");
            $name = $fileUpLoaded->getClientOriginalName();
            $newName = $date . "_" . $name;
            $fileUpLoaded->storeAs("public/uploads", $newName);

            $updateRecord->hsp_tentaptin = $newName;
        }
        $updateRecord->update();
        return redirect(route("hsp.index"));
    }
}
