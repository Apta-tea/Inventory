<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Company') }}</h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="{{ ('company/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<!-- <div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='--'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select> -->
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                {{ Form::open(array('url'=>'company/search','class'=>'form-horizontal','role'=>'search')) }}
                {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'required']) }} 
                {{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
                {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of company-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Company Name</th>
		<th>Address</th>
		<th>File Company Logo</th>
		<th>File Report Logo</th>
		<th>File Report Background</th>
		<th>Report Footer</th>
		<th>Actions</th>
	</tr>
    @isset ($company)
	@foreach ($company as $c)
    <span>
    <tr>
		<td>{{ $c->company_name  }}</td>
		<td>{{ $c->address }}</td>
		<td>
        @if (File::exists(asset('/assets/'.$c->file_company_logo)))
    	  <img src="{{ asset('/assets/'.$c->file_company_logo) }}" class="picture_50x50">
        @else 
        <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif
		<td>
        @if (File::exists(asset('/assets/'.$c->file_report_logo)))
        <img src="{{ asset('/assets/'.$c->file_report_logo) }}" class="picture_50x50">
        @else
        <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif
        </td>
		<td>
        @if (File::exists(asset('/assets/'.$c->file_report_background)))
        <img src="{{ asset('/assets/'.$c->file_report_background) }}" class="picture_50x50">
        @else
        <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif
        </td>
		<td>{{ $c->report_footer }}</td>

		<td><a href="{{ ('company/'.$c->id) }}" class="action-icon"> <i class="fa fa-eye"></i></a> 
            <a href="{{ ('company/'.$c->id.'/edit') }}" class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'company/'.$c->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
</td>
	</tr>
</span>
    @endforeach
</table>
@endisset
<!--End of Data display of company//-->

<!--No data-->
@if (!isset($company)) 
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->

<!--Pagination-->
{{ $company->links() }}
<!--End of Pagination//-->
