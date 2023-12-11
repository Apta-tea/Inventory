<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($unit))
<h5 class="font-20 mt-15 mb-1">Update {{ str_replace('_',' ','Unit') }} </h5>
{{ Form::model($unit, array('url' => 'unit/'.$unit->id, 'method' => 'patch', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8">
            {{ Form::text('unit',$unit->unit,['class'=>'form-control','id'=>'unit']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
            {{ Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success']) }}
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@else
<h5 class="font-20 mt-15 mb-1"> Save {{ str_replace('_',' ','Unit') }} </h5>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url'=>'unit', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8">
            {{ Form::text('unit',null,['class'=>'form-control','id'=>'unit']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
            {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-success']) }}
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}
@endif

<!--End of Form to save data//-->