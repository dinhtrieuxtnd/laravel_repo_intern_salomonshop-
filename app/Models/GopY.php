<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GopY extends Model
{
    //
    protected $table = "gopy";
    protected $fillable = ["gy_hoten", "gy_email", "gy_diachi", "gy_dienthoai", "gy_tieude", "gy_noidung", "cdgy_ma"];
    protected $guarded = ["gy_ma"];
    protected $primaryKey = "gy_ma";
    protected $dates = ["gy_ngaygopy"];
    protected $dateFormat = "Y-m-d H-i-s";
    public $timestamps = false;
    
    public function chuDeGopY(){
        return $this->belongsTo("App\Models\ChuDeGopY", "cdgy_ma","cdgy_ma");
    }
}
