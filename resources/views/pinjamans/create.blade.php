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
 			<form action="{{route('pinjamans.store')}}" method="post">
 			{{csrf_field()}}
 			<div class="form-group">
 				<label class="control-lable">Nama Karyawan</label>
 				<select  class="form-control" name="a">
 				@foreach($karyawan as $data)
 				<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
 				@endforeach
 				</select>
 			   </div>
 		<div class="form-group">
 				<label class="control-lable">Jumlah Pinjaman</label>
 				<input type="text" name="b" class="form-control" required="">
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