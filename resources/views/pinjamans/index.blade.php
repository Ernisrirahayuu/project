@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center>
	<h1>Data Pinjaman</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Pinjaman
		<div class="panel-title pull-right"><a class="btn btn-xs btn-success" href="pinjamans/create">Tambah Pinjaman</a>
		</div>
		</div>
		<div class="panel-body">
		  <table class="table">
		  	<thead>
		  	 <tr>
		  	 	<th>Nama Karyawan</th>
		  	 	<th>Jumlah Pinjaman</th>
		  	 	<th colspan="2">Action</th>
		  	 </tr> 
		  	 </thead>
		  	 <tbody>
		  	 	@foreach($pinjaman as $data)
		  	 	<tr>
		  	 		<td>{{$data->Karyawan->nama}}</td>
		  	 		<td>Rp.{{$data->jumlahpinjaman}}</td>

		   	 	<td>
		  	 		<a class="btn btn-warning" href="/pinjamans/{{$data->id}}/edit">Edit</a>
		  	 		<form action="{{route('pinjamans.destroy',$data->id)}}" method="post">
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