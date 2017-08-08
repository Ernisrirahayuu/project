<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan; 
use Yajra\Datatables\Html\Builder; 
use Yajra\Datatables\Datatables;
use Session;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request, Builder $htmlBuilder) { 
            if ($request->ajax()) { 
            $karyawan = Karyawan::select(['id', 'nama' ,'alamat', 'tanggallahir']
                ); 
            return Datatables::of($karyawan) 
            ->addColumn('action' , function($karyawans) {
                return view('datatable._action', [
                    'model'           =>$karyawans,
                    'form_url'        =>route('karyawans.destroy', $karyawans->id),
                    'edit_url'        =>route('karyawans.edit', $karyawans->id),
                    'confirm_message' =>'Yakin mau menghapus' .$karyawans->name . '?'
                    ]);
            })->make(true);
        }
    $html = $htmlBuilder 
    ->addColumn(['data'=>'id', 'name'=>'id', 'title'=>'Id'])
    ->addColumn(['data' => 'nama', 'name'=>'nama', 'title'=>'Nama'])
    ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
    ->addColumn(['data' => 'tanggallahir', 'name'=>'tanggallahir', 'title'=>'Tanggallahir'])
    ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,
            'searchable'=>false]);
return view('karyawans.index')->with(compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('karyawans.create');
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
        $this->validate($request, ['nama', 'alamat', 'tanggallahir']); 
        $karyawan = Karyawan::create($request->all());
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
        $karyawan = Karyawan::find($id);
        return view('karyawans.edit')->with(compact('karyawan'));
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
        $this->validate($request, ['nama'=> 'required|unique:karyawans,nama,  '. $id]);
        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());
        Session::flash("flash_notification", ["level"=>"success", "message"=>"Berhasil menyimpan $karyawan->name"]);

        return redirect()->route('karyawans.index');
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
        if(!Karyawan::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Karyawan Berhasil Dihapus"
            ]);

        return redirect()->route('karyawans.index');
    }
}
