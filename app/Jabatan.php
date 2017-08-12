<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    //
    protected $table ='jabatans';
    protected $fillable = ['nama_jabatan' ,'besar_uang'];
    protected $visible  = ['nama_jabatan' ,'besar_uang'];
    
    public function Karyawan ()
    {
    	return $this->hasMany('App\Karyawan');
    }

    }
