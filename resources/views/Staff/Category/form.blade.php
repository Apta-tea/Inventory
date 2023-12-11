<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($category))
<h5 class="font-20 mt-15 mb-1">Update {{ str_replace('_',' ','Category') }} </h5>
{{ Form::model($category, array('url' => 'category/'.$category->id, 'method' => 'patch', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
            {{ Form::text('name',$category->name,['class'=>'form-control','id'=>'name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
            {{ Form::text('description',$category->description,['class'=>'form-control','id'=>'description']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
			{{ Form::select('status',['active'=>'active','inactive'=>'inactive'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
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
<h5 class="font-20 mt-15 mb-1"> Save {{ str_replace('_',' ','category') }} </h5>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url'=>'category', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
	<div class="form-group">
			<label for="name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
            {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
            {{ Form::text('description',null,['class'=>'form-control','id'=>'description']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
			{{ Form::select('status',['active'=>'active','inactive'=>'inactive'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
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