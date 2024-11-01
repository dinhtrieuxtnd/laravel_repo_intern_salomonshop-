<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = "loaisanpham";
    protected $fillable = ["lsp_ten", "lsp_mota"];
    protected $guarded = ["lsp_ma"];
    protected $primaryKey = "lsp_ma";
    public $timestamps = false;

    public function danhSachSP(){
        return $this->hasMany("App\Models\SanPham","lsp_ma","lsp_ma");
    }
}
