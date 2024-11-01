<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChuDeGopY extends Model
{
    //
    protected $table = "chudegopy";
    protected $fillable = ['cdgy_ten'];
    protected $guarded = ['cdgy_ma'];
    protected $primaryKey = 'cdgy_ma';
    public $timestamps = false;

    public function dsGopY(){
        return $this->hasMany('App\Models','cdgy_ma','cdgy_ma');
    }
}
