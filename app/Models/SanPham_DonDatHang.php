<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham_DonDatHang extends Model
{
    //
    protected $table = "sanpham_dondathang";
    protected $fillable = ["sp_ma", "dh_ma", "sp_dh_soluong", "sp_dh_dongia"];
    // protected $guarded = ["sp_ma", "dh_ma"];
    // protected $primaryKey = ["sp_ma", "dh_ma"];
    public $timestamps = false;
    public $incrementing = false;

    public function donDatHang(){
        return $this->belongsTo("App\Models\DonDatHang","dh_ma","dh_ma");
    }

    public function sanPham(){
        return $this->belongsTo("App\Models\SanPham","sp_ma","sp_ma");
    }
}
