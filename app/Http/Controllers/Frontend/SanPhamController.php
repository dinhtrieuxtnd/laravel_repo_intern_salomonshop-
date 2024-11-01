<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    //
    public function detail($sp_ma, Request $request){
        $sp = SanPham::find( $sp_ma );
        return view("frontend/sanpham/detail")
            ->with("sp", $sp);
    }
}
