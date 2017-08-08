<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $fillable = ['id','karyawan_id','gaji_id','pinjaman_id'];
    public function Karyawan ()
    {
    	return $this->hasMany('App\Karyawan');
    }
}
