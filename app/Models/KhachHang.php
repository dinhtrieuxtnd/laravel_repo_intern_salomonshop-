<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    //
    protected $rememberTokenName = 'kh_ghinhodangnhap';
    protected $table = "khachhang";
    protected $fillable = [ "kh_matkhau", "kh_ten", "kh_gioitinh", "kh_diachi", "kh_dienthoai", "kh_email",
                            "kh_ngaysinh", "kh_thangsinh", "kh_namsinh", "kh_cmnd", "kh_trangthai", "kh_quantri"];
    protected $guarded = ["kh_tendangnhap"];
    protected $primaryKey = "kh_tendangnhap";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = false;

    public function dsDonHang(){
        return $this->hasMany("App\Models\DonDatHang","kh_tendangnhap","kh_tendangnhap");
    }

    public function getAuthIdentifierName(){
        return $this->getKeyName();
    }

    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getRememberToken(){
        if(! empty($this->getRememberTokenName())){
            return (string) $this->{$this->getRememberTokenName()};
        }
    }

    public function setRememberToken($value){
        if(! empty($this->getRememberTokenName())){
            $this->{$this->getRememberTokenName()} = $value;
        }
    }

    public function getRememberTokenName(){
        return $this->rememberTokenName;
    }

    public function getAuthPassword(){
        return $this->kh_matkhau;
    }


    public function setPasswordAttribute($value){
        $this->attributes['kh_matkhau'] = bcrypt($value);
    }

    public function getUsernameAttribute(){
        return $this->attributes['kh_tendangnhap'];
    }
}
