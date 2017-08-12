<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\totalgaji;
use App\Karyawan;
use App\Jabatan;
use App\Pinjaman;
use DB;

class totalgajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalgaji =Totalgaji::all();
        return view('totalgaji.index', compact('totalgaji'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $total1=Karyawan::all();
        $total2 =Jabatan::all();
        $total3 =Pinjaman::all();
        return view('totalgaji.create',compact('total1', 'total2', 'total3'));
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
        $a =$request->all();
        $karyawan =Karyawan::where('id', $a['a'])->first();
        $jabatan  =Jabatan::where('id', $karyawan->jabatan_id)->first();
        $jaba = $jabatan->besar_uang;

        $totalgaji = new totalgaji;
        $totalgaji->karyawan_id = $request['a'];
        $totalgaji->jabatan_id   = $jaba;
        $totalgaji->pinjaman_id  = $request['pinjaman_id'];
        // dd($totalgaji);
        $totalgaji->save();

        
        return redirect()->route('totalgaji.index');
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
        $totall = TotalGaji::findOrFail($id);
         $total1= Jabatan::all();
         $total2 = Karyawan::all();
         $total3 =Pinjaman::all();
        return view('totalgaji.edit',compact('totall','total1', 'total2', 'total3'));
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
        $a =$request->all();
        $karyawan =Karyawan::where('id', $a['a'])->first();
        $jabatan  =Jabatan::where('id', $karyawan->jabatan_id)->first();
        $jaba = $jabatan->besar_uang;

        $totalgaji =TotalGaji::findOrFail($id);
        $totalgaji->karyawan_id = $request['a'];
        $totalgaji->jabatan_id   = $jaba;
        $totalgaji->pinjaman_id  = $request['pinjaman_id'];
        // dd($totalgaji);
        $totalgaji->save();


        return redirect()->route('totalgaji.index');

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
        $totalgaji =TotalGaji::findOrFail($id);
        $totalgaji->delete();
        return redirect('totalgaji');
    }
}
