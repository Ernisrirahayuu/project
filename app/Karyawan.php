<?php

namespace App;
use Gaji;
use Pinjaman;
use Total;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['id','nama','alamat','tanggallahir'];
    public function Pinjaman ()
    {
    	return $this->hasMany('App\Pinjaman');
    }

    public function Gaji ()
    {
    	return $this->hasMany('App\Gaji');
    }

    public function Total ()
    {
    	return $this->hasMany('App\Total');
    }
}
