<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($company))
<h5 class="font-20 mt-15 mb-1">Update {{ str_replace('_',' ','Company') }} </h5>
{{ Form::model($company, array('url' => 'company/'.$company->id, 'method' => 'patch', 'class' => 'form-horizontal', 'files' => 'true')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Company Name" class="col-md-4 control-label">Company Name</label>
			<div class="col-md-8">
			{{ Form::text('company_name',$company->company_name,['class'=>'form-control','id'=>'company_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
			{{ Form::textarea('address',$company->address,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Country" class="col-md-4 control-label">Country</label>
			<div class="col-md-8">
			{{ Form::text('country',$company->country,['class'=>'form-control','id'=>'country']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
			{{ Form::text('city',$company->city,['class'=>'form-control','id'=>'city']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
			{{ Form::text('state',$company->state,['class'=>'form-control','id'=>'state']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Zip" class="col-md-4 control-label">Zip</label>
			<div class="col-md-8">
			{{ Form::text('zip',$company->zip,['class'=>'form-control','id'=>'zip']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Company Logo" class="col-md-4 control-label">File
				Company Logo</label>
			<div class="col-md-8">
			{{ Form::file('file_company_logo',null,['class' => 'form-control-file', 'id' => 'file_company_logo']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Report Logo" class="col-md-4 control-label">File
				Report Logo</label>
			<div class="col-md-8">
			{{ Form::file('file_report_logo',null,['class' => 'form-control-file', 'id' => 'file_report_logo']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Report Background" class="col-md-4 control-label">File
				Report Background</label>
			<div class="col-md-8">
			{{ Form::file('file_report_background',null,['class' => 'form-control-file', 'id' => 'file_report_background']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Report Footer" class="col-md-4 control-label">Report
				Footer</label>
			<div class="col-md-8">
			{{ Form::text('report_footer',$company->report_footer,['class'=>'form-control','id'=>'report_footer']) }}
			</div>
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
<h5 class="font-20 mt-15 mb-1"> Save {{ str_replace('_',' ','Company') }} </h5>
{{ Html::ul($errors->all()) }}
{{ Form::open(array('url'=>'company', 'class' => 'form-horizontal', 'files' => 'true')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Company Name" class="col-md-4 control-label">Company Name</label>
			<div class="col-md-8">
			{{ Form::text('company_name',null,['class'=>'form-control','id'=>'company_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
			{{ Form::textarea('address',null,['class'=>'form-control','id'=>'address']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Country" class="col-md-4 control-label">Country</label>
			<div class="col-md-8">
			{{ Form::text('country',null,['class'=>'form-control','id'=>'country']) }}
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
			<label for="File Company Logo" class="col-md-4 control-label">File
				Company Logo</label>
			<div class="col-md-8">
			{{ Form::file('file_company_logo',null,['class' => 'form-control-file', 'id' => 'file_company_logo']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Report Logo" class="col-md-4 control-label">File
				Report Logo</label>
			<div class="col-md-8">
			{{ Form::file('file_report_logo',null,['class' => 'form-control-file', 'id' => 'file_report_logo']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="File Report Background" class="col-md-4 control-label">File
				Report Background</label>
			<div class="col-md-8">
			{{ Form::file('file_report_background',null,['class' => 'form-control-file', 'id' => 'file_report_background']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Report Footer" class="col-md-4 control-label">Report
				Footer</label>
			<div class="col-md-8">
			{{ Form::text('report_footer',null,['class'=>'form-control','id'=>'report_footer']) }}
			</div>
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