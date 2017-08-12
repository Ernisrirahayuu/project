<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan; 
use DB;
use App\Jabatan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index() {

        $karyawan = Karyawan::with('Jabatan')->get();
        return view('karyawans.index', compact('karyawan'));      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::all(); 
        return view('karyawans.create',compact('jabatan','karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $karyawans = new Karyawan;
        $karyawans->nama = $request->a;
        $karyawans->jabatan_id   = $request->b;
        $karyawans->alamat       = $request->c;
        $karyawans->tanggallahir = $request->d;
        $karyawans->save();
        
        return redirect()->route('karyawans.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);
         $jabatan = Jabatan::all();
        return view('karyawans.edit',compact('karyawan', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $karyawans =Karyawan::find($id);
        $karyawans->nama = $request->a;
        $karyawans->jabatan_id    = $request->b;
        $karyawans->alamat        = $request->c;
        $karyawans->tanggallahir  =$request->d;
        $karyawans->save();
        $karyawan = DB::table('karyawans')
                    ->join('jabatans', 'karyawans.jabatan_id','=','jabatans.id')
                    ->select('karyawans.*','jabatans.nama_jabatan')->get();
        return redirect('karyawans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $karyawan =Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect('/admin/karyawans');
    }
}
