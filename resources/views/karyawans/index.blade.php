@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center>
	<h1>Data Karyawan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Karyawan
		<div class="panel-title pull-right"><a class="btn btn-xs btn-success" href="/karyawans/create">Tambah Karyawan</a>
		</div>
		</div>
		<div class="panel-body">
		  <table class="table">
		  	<thead>
		  	 <tr>
		  	 	<th>Nama Karyawan</th>
		  	 	<th>Nama Jabatan</th>
		  	 	<th>Alamat</th>
		  	 	<th>Tanggal Lahir</th>
		  	 	<th colspan="2">Action</th>
		  	 </tr> 
		  	 </thead>
		  	 <tbody>
		  	 	@foreach($karyawan as $data)
		  	 	<tr>
		  	 		<td>{{$data->nama}}</td>
		  	 		<td>{{$data->jabatan->nama_jabatan}}</td>
		  	 		<td>{{$data->alamat}}</td>
		  	 		<td>{{$data->tanggallahir}}</td>
		   	 	<td>
		  	 		<a class="btn btn-warning" href="/karyawans/{{$data->id}}/edit">Edit</a>
		  	 		<form action="{{route('karyawans.destroy',$data->id)}}" method="post">
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