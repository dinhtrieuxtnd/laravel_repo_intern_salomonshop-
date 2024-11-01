<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhSanPham extends Model
{
    //
    protected $table = "hinhsanpham";
    protected $fillable = ["hsp_tentaptin", "sp_ma"];
    protected $guarded = ["hsp_ma"];
    protected $primaryKey = "hsp_ma";
    public $timestamps = false;

    public function sanPham(){
        return $this->belongsTo("App\Models\SanPham","sp_ma","sp_ma");
    }
}
