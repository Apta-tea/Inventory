<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($user))
<h5 class="font-20 mt-15 mb-1">Update User</h5>
{{ Form::model($user, array('url' => 'user/'.$user->id, 'method' => 'patch', 'class' => 'form-horizontal','files'=>'true')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
			{{ Form::text('email',$user->email,['class'=>'form-control','id'=>'email']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Password" class="col-md-4 control-label">Password</label>
			<div class="col-md-8">
			{{ Form::password('password',null,['class'=>'form-control','id'=>'password']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Title" class="col-md-4 control-label">Title</label>
			<div class="col-md-8">
			{{ Form::text('title',$user->title,['class'=>'form-control','id'=>'title']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="First Name" class="col-md-4 control-label">First Name</label>
			<div class="col-md-8">
			{{ Form::text('first_name',$user->first_name,['class'=>'form-control','id'=>'first_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Last Name" class="col-md-4 control-label">Last Name</label>
			<div class="col-md-8">
			{{ Form::text('last_name',$user->last_name,['class'=>'form-control','id'=>'last_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Picture" class="col-md-4 control-label">File Picture</label>
			<div class="col-md-8">
			{{ Form::file('file_picture',null,['class'=>'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Phone No" class="col-md-4 control-label">Phone No</label>
			<div class="col-md-8">
			{{ Form::text('phone_no',$user->phone_no,['class'=>'form-control','id'=>'phone_no']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Dob" class="col-md-4 control-label">Dob</label>
			<div class="col-md-8">
			{{ Form::text('dob',$user->dob,['class'=>'form-control datepicker','id'=>'dob']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Company" class="col-md-4 control-label">Company</label>
			<div class="col-md-8">
				{{ Form::text('company',$user->company,['class'=>'form-control','id'=>'company']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
			{{ Form::text('address',$user->address,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
			{{ Form::text('city',$user->city,['class'=>'form-control','id'=>'city']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
			{{ Form::text('state',$user->state,['class'=>'form-control','id'=>'state']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Zip" class="col-md-4 control-label">Zip</label>
			<div class="col-md-8">
			{{ Form::text('zip',$user->zip,['class'=>'form-control','id'=>'zip']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-md-4 control-label">country</label>
			@php $country = App\Models\countrys::pluck('country','id') @endphp 
			<div class="col-md-8">
			{{ Form::select('country_id',$country,null,['class'=>'form-control','id'=>'country_id']) }}
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Update</button>
	</div>
</div>
{{ Form::close() }}
@else
<h5 class="font-20 mt-15 mb-1">Save User</h5>
{{ Form::open(array('url'=>'user', 'class' => 'form-horizontal', 'files' => 'true')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
			{{ Form::text('email',null,['class'=>'form-control','id'=>'email', 'required']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Password" class="col-md-4 control-label">Password</label>
			<div class="col-md-8">
			{{ Form::password('password', ['class'=> 'form-control', 'id'=> 'password', 'required']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Title" class="col-md-4 control-label">Title</label>
			<div class="col-md-8">
			{{ Form::text('title',null,['class'=>'form-control','id'=>'title']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="First Name" class="col-md-4 control-label">First Name</label>
			<div class="col-md-8">
			{{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Last Name" class="col-md-4 control-label">Last Name</label>
			<div class="col-md-8">
			{{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Picture" class="col-md-4 control-label">File Picture</label>
			<div class="col-md-8">
			{{ Form::file('file_picture',null,['class'=>'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Phone No" class="col-md-4 control-label">Phone No</label>
			<div class="col-md-8">
			{{ Form::text('phone_no',null,['class'=>'form-control','id'=>'phone_no']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Dob" class="col-md-4 control-label">Dob</label>
			<div class="col-md-8">
			{{ Form::text('dob',null,['class'=>'form-control datepicker','id'=>'dob']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Company" class="col-md-4 control-label">Company</label>
			<div class="col-md-8">
				{{ Form::text('company',null,['class'=>'form-control','id'=>'company']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
			{{ Form::text('address',null,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
			{{ Form::text('city',null,['class'=>'form-control','id'=>'city']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
			{{ Form::text('state',null,['class'=>'form-control','id'=>'state']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Zip" class="col-md-4 control-label">Zip</label>
			<div class="col-md-8">
			{{ Form::text('zip',null,['class'=>'form-control','id'=>'zip']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="col-md-4 control-label">country</label>
			@php $country = App\Models\countrys::pluck('country','id') @endphp 
			<div class="col-md-8">
			{{ Form::select('country_id',$country,null,['class'=>'form-control','id'=>'country_id']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="user_type" class="col-md-4 control-label">User Type</label>
			<div class="col-md-8">
			{{ Form::select('user_type',['super'=>'super','staff'=>'staff','client'=>'client','visitor'=>'visitor'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
			{{ Form::select('status',['active'=>'active','inactive'=>'inactive'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>
{{ Form::close() }}
@endif
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '{{ asset('/assets/datepicker/images/calendar.gif') }}',
	});
</script>