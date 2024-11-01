<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonDatHang extends Model
{
    //
    protected $table = "dondathang";
    protected $fillable = [ "dh_noigiao","dh_trangthaithanhtoan",
                            "httt_ma","kh_tendangnhap"];
    protected $guarded = ["dh_ma"];
    protected $primaryKey = "dh_ma";
    protected $dates = ["dh_ngaylap", "dh_ngaygiao"];
    protected $dateFormat = "Y-m-d H-i-s";

    public $timestamps = false;

    public function khachHang(){
        return $this->belongsTo("App\Models\KhachHang","kh_tendangnhap","kh_tendangnhap");
    }

    public function httt(){
        return $this->belongsTo("App\Models\HinhThucThanhToan","httt_ma","httt_ma");
    }

    public function chiTietDonHang(){
        return $this->hasMany("App\Models\SanPham_DonDatHang","dh_ma","dh_ma");
    }
}
