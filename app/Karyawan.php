<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $fillable = ['nama','jabatan_id','alamat','tanggallahir'];
    
    public function Jabatan ()
    {
    	return $this->belongsTo('App\Jabatan');
    }

    public function Pinjaman ()
    {
    	return $this->hasMany('App\Pinjaman');
    }

    public function TotalGaji ()
    {
    	return $this->hasMany('App\TotalGaji');
    }
}
