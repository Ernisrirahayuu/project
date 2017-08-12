@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center>
	<h1>Data Total Gaji</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Total Gaji
		<div class="panel-title pull-right"><a class="btn btn-xs btn-success" href="totalgaji/create">Tambah Total Gaji</a>
		</div>
		</div>
		<div class="panel-body">
		  <table class="table">
		  	<thead>
		  	 <tr>
		  	 	<th>Nama Karyawan</th>
		  	 	<th>Nama Jabatan</th>
		  	 	<th>Jumlah Pinjaman</th>
		  	 	<th>Gaji</th>
		  	 	<th>Gaji Yang Didapat</th>
		  	 	<th>Action</th>
		  	 </tr> 
		  	 </thead>
		  	 <tbody>
		  	 	@foreach($totalgaji as $data)
		  	 	<tr>
		  	 		<td>{{$data->Karyawan->nama}}</td>
		  	 		<td>{{$data->Karyawan->Jabatan->nama_jabatan}}</td>
		  	 		<td>Rp.{{$data->Pinjaman->jumlahpinjaman}}</td>
		  	 		<td>Rp.{{$data->Karyawan->Jabatan->besar_uang}}</td>
		  	 		<td>Rp.{{$data->Karyawan->Jabatan->besar_uang - $data->Pinjaman->jumlahpinjaman}}</td>
		   	 	<td>
		  	 		<a class="btn btn-warning" href="totalgaji/{{$data->id}}/edit">Edit</a>
		  	 		<form action="{{route('totalgaji.destroy',$data->id)}}" method="post">
		  	 			<input name="_method" type="hidden" value="DELETE">
		  	 			<input name="_token" type="hidden">
		  	 			<input class="btn btn-danger"  type="submit" value="Delete">
		  	 			{{csrf_field()}}
		  	 		</form>
		  	 	</td>
		  	 	</tr>
		  	 	@endforeach
		  	 </tbody>
		  	 </table>
	  </div>
   </div>
</div>
</div>

@endsection