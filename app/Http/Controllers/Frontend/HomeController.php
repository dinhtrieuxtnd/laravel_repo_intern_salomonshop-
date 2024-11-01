<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $dsSp = SanPham::all();
        return view("frontend/home/index")
            ->with("dsSp", $dsSp);
    }
}
