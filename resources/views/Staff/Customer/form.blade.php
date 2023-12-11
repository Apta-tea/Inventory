<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($customer))
<h5 class="font-20 mt-15 mb-1">Update {{ str_replace('_',' ','Customer') }} </h5>
{{ Form::model($customer, array('url' => 'customer/'.$customer->id, 'method' => 'patch', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="customer_name" class="col-md-4 control-label">Customer Name</label>
			<div class="col-md-8">
            {{ Form::text('customer_name',$customer->customer_name,['class'=>'form-control','id'=>'customer_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
            {{ Form::text('email',$customer->email,['class'=>'form-control','id'=>'email']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
            {{ Form::textarea('address',$customer->address,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
            {{ Form::text('city',$customer->city,['class'=>'form-control','id'=>'city']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="state" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
            {{ Form::text('state',$customer->state,['class'=>'form-control','id'=>'state']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="zip" class="col-md-4 control-label">Zip</label>
			<div class="col-md-8">
            {{ Form::text('zip',$customer->zip,['class'=>'form-control','id'=>'zip']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="phone_no" class="col-md-4 control-label">Phone No</label>
			<div class="col-md-8">
            {{ Form::text('phone_no',$customer->phone_no,['class'=>'form-control','id'=>'phone_no']) }}
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
<h5 class="font-20 mt-15 mb-1"> Save {{ str_replace('_',' ','Customer') }} </h5>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url'=>'customer', 'class' => 'form-horizontal')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="customer_name" class="col-md-4 control-label">Customer Name</label>
			<div class="col-md-8">
            {{ Form::text('customer_name',null,['class'=>'form-control','id'=>'customer_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
            {{ Form::text('email',null,['class'=>'form-control','id'=>'email']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
            {{ Form::textarea('address',null,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
            {{ Form::text('city',null,['class'=>'form-control','id'=>'city']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="state" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
            {{ Form::text('state',null,['class'=>'form-control','id'=>'state']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="zip" class="col-md-4 control-label">Zip</label>
			<div class="col-md-8">
            {{ Form::text('zip',null,['class'=>'form-control','id'=>'zip']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="phone_no" class="col-md-4 control-label">Phone No</label>
			<div class="col-md-8">
            {{ Form::text('phone_no',null,['class'=>'form-control','id'=>'phone_no']) }}
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