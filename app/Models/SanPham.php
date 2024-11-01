<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = "sanpham";
    protected $fillable = [ "sp_ten","sp_gia","sp_giacu","sp_mota_ngan",
                            "sp_mota_chitiet","sp_soluong","lsp_ma","nsx_ma","km_ma"];
    protected $guarded = ["sp_ma"];
    protected $primaryKey = "sp_ma";
    protected $dates = ["sp_ngaycapnhat"];
    protected $dateFormat = "Y-m-d H-i-s";
    public $timestamps = false;
    
    public function loaiSP(){
        return $this->belongsTo('App\Models\LoaiSanPham',"lsp_ma","lsp_ma");
    }

    public function nsx(){
        return $this->belongsTo("App\Models\NhaSanXuat","nsx_ma","nsx_ma");
    }

    public function khuyenMai(){
        return $this->belongsTo("App\Models\KhuyenMai","km_ma","km_ma");
    }

    public function dsHinhSP(){
        return $this->hasMany("App\Models\HinhSanPham","sp_ma","sp_ma");
    }

    public function chiTietDonHang(){
        return $this->hasMany("App\Models\SanPham_DonDatHang","sp_ma","sp_ma");
    }
}
