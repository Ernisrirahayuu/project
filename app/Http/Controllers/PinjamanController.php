<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;
use App\Karyawan;
use DB;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pinjaman = Pinjaman::all();
      
        return view('pinjamans.index', compact('pinjaman', 'pinjam')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan=Karyawan::all();
        return view('pinjamans.create',compact('karyawan'));
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
        $this->validate($request,['a'=>'required','b'=>'required']);
        $pinjaman = new Pinjaman;
        $pinjaman->karyawan_id = $request->a;
        $pinjaman->jumlahpinjaman = $request->b;
        $pinjaman->save();
        return redirect('pinjamans');
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
        $pinjaman = Pinjaman::findOrFail($id);
        $karyawan = Karyawan::all();
        return view('pinjamans.edit',compact('pinjaman', 'karyawan'));
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
        $pinjaman =Pinjaman::find($id);
        $pinjaman->karyawan_id = $request->b;
        $pinjaman->jumlahpinjaman   = $request->a;
        $pinjaman->save();
        $pinjaman = DB::table('pinjamen')
                    ->join('karyawans', 'pinjamen.karyawan_id','=','karyawans.id')
                    ->select('pinjamen.*','karyawans.nama')->get();

        return view('pinjamans.index', compact('pinjaman', 'karyawan'));
       
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
        $pinjaman =Pinjaman::findOrFail($id);
        $pinjaman->delete();
        return redirect('pinjamans');
    }
}
