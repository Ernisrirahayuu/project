<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    //
    protected $table = 'pinjamen';
    protected $fillable = ['karyawan_id','jumlahpinjaman'];
    public function Karyawan ()
    {
    	return $this->belongsTo('App\Karyawan');
    }

    public function TotalGaji()
    {
    	return $this->hasMany('App\TotalGaji');
    }
}
