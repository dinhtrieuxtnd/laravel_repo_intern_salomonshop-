<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    //
    protected $table = "hinhthucthanhtoan";
    protected $fillable = ["httt_ten"];
    protected $guarded = ["httt_ma"];
    protected $primaryKey = "httt_ma";
    public $timestamps = false;

    public function donDatHang(){
        return $this->hasMany("App\Model\DonDatHang","httt_ma","httt_ma");
    }
}
