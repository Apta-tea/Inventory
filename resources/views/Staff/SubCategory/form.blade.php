<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($scategory))
<h5 class="font-20 mt-15 mb-1">Update {{ str_replace('_',' ','Sub category') }} </h5>
{{ Form::model($scategory, array('url' => 'scat/'.$scategory->id, 'method' => 'patch', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="country" class="col-md-4 control-label">Category</label> 
			<div class="col-md-8">
			{{ Form::select('category_id',$category,null,['class'=>'form-control','id'=>'category_id']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
            {{ Form::text('name',$scategory->name,['class'=>'form-control','id'=>'name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
            {{ Form::text('description',$scategory->description,['class'=>'form-control','id'=>'description']) }}
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
<h5 class="font-20 mt-15 mb-1"> Save {{ str_replace('_',' ','Sub Category') }} </h5>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url'=>'scat', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
	<div class="form-group">
			<label for="country" class="col-md-4 control-label">Category</label> 
			<div class="col-md-8">
			{{ Form::select('category_id',$category,null,['class'=>'form-control','id'=>'category_id']) }}
			</div>
		</div>
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