<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Company') }}</h5>
<!--Data display of country with id-->
@if (isset($company))   
<table class="table table-striped table-bordered">
	<tr>
		<td>Company Name</td>
		<td>{{ $company->company_name }}</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ $company->address }}</td>
	</tr>
	<tr>
		<td>Country</td>
		<td>{{ $company->country }}</td>
	</tr>
	<tr>
		<td>City</td>
		<td>{{ $company->city }}</td>
	</tr>
	<tr>
		<td>State</td>
		<td>{{ $company->state }}</td>
	</tr>
	<tr>
		<td>Zip</td>
		<td>{{ $company->zip }}</td>
	</tr>
	<tr>
		<td>File Company Logo</td>
		<td>
		@if (File::exists(public_path().'/assets/'.$company->file_company_logo))
    	<img src="{{ asset('/assets/'.$company->file_company_logo) }}" class="picture_50x50">
        @else 
       	<img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif
		</td>
	</tr>
	<tr>
		<td>File Report Logo</td>
		<td>
		@if (File::exists(public_path().'/assets/'.$company->file_report_logo))
        <img src="{{ asset('/assets/'.$company->file_report_logo) }}" class="picture_50x50">
        @else
        <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif
		</td>
	</tr>
	<tr>
		<td>File Report Background</td>
		<td>
		@if (File::exists(public_path().'/assets/'.$company->file_report_background))
        <img src="{{ asset('/assets/'.$company->file_report_background) }}" class="picture_50x50">
        @else
        <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_50x50">
        @endif	
		</td>
	</tr>
	<tr>
		<td>Report Footer</td>
		<td>{{ $company->report_footer }}</td>
	</tr>
</table>
<!--End of Data display of company with id//-->
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of country with id//-->