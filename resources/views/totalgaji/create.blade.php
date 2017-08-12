@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
 	<center><h1>Data Total Gaji</h1></center>
 	<div class="panel panel-primary">
 		<div class="panel-heading">Tambah Total Gaji
 		<div class="panel-title pull-right">
 			<a href="{{ URL::previous() }}">Kembali </a></div>
 		</div>
 		<div class="panel-body">
 			<form action="{{route('totalgaji.store')}}" method="post">
 			{{csrf_field()}}
 			<div class="form-group">
 				<label class="control-lable">Nama Karyawan</label>
 				<select  class="form-control" name="a">
 				@foreach($total1 as $data)
 				<option value="{{$data->id}}" selected="">{{$data->nama}}</option>
 				@endforeach
 				</select>
 			   </div>
 			   <div class="form-group">
 				<label class="control-lable">Pinjaman</label>
 				<select  class="form-control" name="pinjaman_id">
 				@foreach($total3 as $data)
 				<option value="{{$data->id}}" selected="">{{$data->Karyawan->nama}} pinjamannya {{$data->jumlahpinjaman}}</option>
 				@endforeach
 				</select>
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