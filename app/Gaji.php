<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $fillable = ['id','karyawan_id','gaji'];
    public function Karyawan ()
    {
    	return $this->hasMany('App\Karyawan');
    }
}
