<?php

use App\Http\Controllers\Frontend\GioHangController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\HinhSanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SanPhamController as FSanPhamController;
use App\Http\Controllers\Frontend\ThanhToanController;
use App\Http\Controllers\Auth\LoginController;


// -------------------- BACKEND -----------------------

// Loại sản phẩm
Route::get('/loai-san-pham',
        [LoaiSanPhamController::class,'index'])
        ->name('dsLoaiSP.index');

Route::get('/loai-san-pham/create',
        [LoaiSanPhamController::class,'create'])
        ->name('dsLoaiSP.create');

Route::post('loai-san-pham/save',
        [LoaiSanPhamController::class,'save'])
        ->name('dsLoaiSP.save');

Route::post('/loai-san-pham/delete',
        [LoaiSanPhamController::class,'delete'])
        ->name('dsLoaiSP.delete');

Route::get('loai-san-pham/edit',
        [LoaiSanPhamController::class,'edit'])
        ->name('dsLoaiSP.edit');

Route::post('loai-san-pham/update',
        [LoaiSanPhamController::class,'update'])
        ->name('dsLoaiSP.update');

// Sản phẩm
Route::get('/san-pham',
        [SanPhamController::class,'index'])
        ->name('sp.index');

Route::get('/san-pham/create',
        [SanPhamController::class,'create'])
        ->name('sp.create');

Route::post('/san-pham/save',
        [SanPhamController::class,'save'])
        ->name('sp.save');

Route::post('/san-pham/delete',
        [SanPhamController::class,'delete'])
        ->name('sp.delete');

Route::get('/san-pham/edit',
        [SanPhamController::class,'edit'])
        ->name('sp.edit');

Route::post('/san-pham/update',
        [SanPhamController::class,'update'])
        ->name('sp.update');

// Hình sản phẩm
Route::get('/hinh-san-pham',
        [HinhSanPhamController::class,'index'])
        ->name('hsp.index');

Route::get('/hinh-san-pham/create',
        [HinhSanPhamController::class,'create'])
        ->name('hsp.create');

Route::post('/hinh-san-pham/save',
        [HinhSanPhamController::class,'save'])
        ->name('hsp.save');

Route::post('/hinh-san-pham/delete',
        [HinhSanPhamController::class,'delete'])
        ->name('hsp.delete');

Route::get('/hinh-san-pham/edit',
        [HinhSanPhamController::class,'edit'])
        ->name('hsp.edit');

Route::post('/hinh-san-pham/update',
        [HinhSanPhamController::class,'update'])
        ->name('hsp.update');


// -------------------- FRONTEND ----------------------

Route::get('/',
        [HomeController::class,'index'])->name('frontend.home.index');

Route::get('/san-pham/{sp_ma}',
        [FSanPhamController::class,'detail'])
        ->name('frontend.sp.detail');

Route::post('/gio-hang/create',
        [GioHangController::class,'create'])
        ->name('frontend.giohang.create');

Route::get('/gio-hang',
        [GioHangController::class,'index'])
        ->name('frontend.giohang.index');

Route::post('/gio-hang/delete',
        [GioHangController::class,'delete'])
        ->name('frontend.giohang.delete');

Route::get('/thanh-toan',
        [ThanhToanController::class,'index'])
        ->name('frontend.thanhtoan.index');

Route::post('/thanh-toan/confirm',
        [ThanhToanController::class,'confirm'])
        ->name('frontend.thanhtoan.confirm');

Route::get('/thanh-toan/succOrder',
        [ThanhToanController::class,'succOrder'])
        ->name('frontend.thanhtoan.succOrder');


// ---------------- Authentication ------------------

// Đăng nhập
Route::get('/dang-nhap',
        [LoginController::class,'index'])
        ->name('auth.login.index');

Route::post('/dang-nhap/submit',
        [LoginController::class,'login'])
        ->name('auth.login.login');


// Đăng xuất
Route::post('/dang-xuat',
        [LoginController::class,'logout'])
        ->name('auth.login.logout');
