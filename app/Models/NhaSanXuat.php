<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    //
    protected $table = "nhasanxuat";
    protected $fillable = ["nsx_ten"];
    protected $guarded = ["nsx_ma"];
    protected $primaryKey = "nsx_ma";
    public $timestamps = false;

    public function danhSachSP(){
        return $this->hasMany("App\Models\SanPham","nsx_ma","nsx_ma");
    }
}
