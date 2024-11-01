<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    //
    protected $table = "khuyenmai";
    protected $fillable = ["km_ten", "km_noidung", "km_tungay", "km_denngay"];
    protected $guarded = ["km_ma"];
    protected $primaryKey = "km_ma";
    protected $dates = ["km_tungay", "km_denngay"];
    protected $dateFormat = "Y-m-d H-i-s";
    public $timestamps = false;

    public function danhSachSP(){
        return $this->hasMany("App\Models\SanPham","km_ma","km_ma");
    }
}
