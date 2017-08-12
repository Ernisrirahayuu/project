@extends('layouts.app')
@section('content')
	<div class="container">
 <div class="row">
 	<center><h1>Data Pinjaman</h1></center>
 	<div class="panel panel-primary">
 		<div class="panel-heading">Data Pinjaman
 		<div class="panel-title pull-right">
 			<a href="{{ URL::previous() }}">Kembali </a></div>
 		</div>

 		<div class="panel-body">
 			<form action="{{route('pinjamans.update', $pinjaman->id)}}" method="POST">
 			<input type="hidden" name="_method" value="PUT">
 			<input type="hidden" name="_token" value="{{ csrf_token() }}">
 			
		<div class="form-group">
 				<label class="control-lable">Nama Karyawan</label>
 				<select  class="form-control" name="b">
 				@foreach($karyawan as $data)
 				<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
 				@endforeach
 				</select>
 				</div>

 		<div class="form-group">
 				<label class="control-lable">Jumlah Pinjaman</label>
 				<input type="text" name="a" value="{{$pinjaman->jumlahpinjaman}}" class="form-control" required="">
 				</div>
 		<div class="form-group">
 				<button type="submit" class="btn btn-success">Simpan</button>
 				<button type="reset" class="btn btn-danger">Reset</button>	
 			</div>
 		</form>
 		</div>
 	</div>
 </div>
 </div>
 @endsection