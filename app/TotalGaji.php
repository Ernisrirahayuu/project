<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalGaji extends Model
{
    //
    protected $fillable  = ['karyawan_id','jabatan_id','pinjaman_id'];
    
    public function Karyawan()
    {
    	return $this->belongsTo('App\Karyawan');
    }

    public function Pinjaman()
    {
    	return $this->belongsTo('App\Pinjaman');
    }
}
