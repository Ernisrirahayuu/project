@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<center>
	<h1>Data Jabatan</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Data Jabatan
		<div class="panel-title pull-right"><a class="btn btn-xs btn-success" href="jabatans/create">Tambah Data</a>
		</div>
		</div>
		<div class="panel-body">
		  <table class="table">
		  	<thead>
		  	 <tr>
		  	 	<th>Nama Jabatan</th>
		  	 	<th>Besaran Uang</th>
		  	 	<th>Action</th>
		  	 </tr> 
		  	 </thead>
		  	 <tbody>
		  	 	@foreach($jabatan as $data)
		  	 	<tr>
		  	 		<td>{{$data->nama_jabatan}}</td>
		  	 		<td>{{$data->besar_uang}}</td>
		  	 		
		   	 	<td>
		  	 		<a class="btn btn-warning" href="jabatans/{{$data->id}}/edit">Edit</a>
		  	 		<form action="{{route('jabatans.destroy',$data->id)}}" method="post">
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