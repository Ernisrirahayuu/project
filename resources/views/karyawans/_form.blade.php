<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}"> 
	{!! Form::label('nama', 'Nama', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::text('nama', null, ['class'=>'form-control']) !!} 
			{!! $errors->first('nama', 
			'<p class="help-block">:message</p>') !!} 
				</div> 
					</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}"> 
	{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::text('alamat', null, ['class'=>'form-control']) !!} 
			{!! $errors->first('alamat', 
			'<p class="help-block">:message</p>') !!} 
				</div> 
					</div>

<div class="form-group{{ $errors->has('tanggallahir') ? ' has-error' : '' }}"> 
	{!! Form::label('tanggallahir', 'Tanggallahir', ['class'=>'col-md-2 control-label']) !!} 
	<div class="col-md-4"> 
		{!! Form::date('tanggallahir', null, ['class'=>'form-control']) !!} 
			{!! $errors->first('tanggallahir', 
			'<p class="help-block">:message</p>') !!} 
				</div> 
					</div>					
<div class="form-group"> 
	<div class="col-md-4 col-md-offset-2"> 
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
</div> 
	</div>