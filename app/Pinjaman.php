<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $fillable = ['id','karyawan_id','jumlahpinjaman'];
    public function Karyawan ()
    {
    	return $this->hasMany('App\Karyawan');
    }
}
