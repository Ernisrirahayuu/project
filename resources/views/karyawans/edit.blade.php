@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/karyawans') }}">Karyawan</a></li>
				<li class="active">Ubah Karyawan</li>
			</ul>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Karyawan</h2>
				</div>

				<div class="panel-body">
					{!! Form::model($karyawan, ['url' => route('karyawans.update', $karyawan->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('karyawans._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection