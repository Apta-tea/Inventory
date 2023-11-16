<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Company') }}</h5>
<!--Data display of country with id-->
@if (isset($company))
<table class="table table-striped table-bordered">
	<tr>
		<th>Company Name</th>
		<th>Address</th>
		<th>File Company Logo</th>
		<th>File Report Logo</th>
		<th>File Report Background</th>
		<th>Report Footer</th>
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
	</tr>
</span>
    @endforeach
</table>
@endisset
<!--Pagination-->
{{ $company->links() }}
<!--End of Pagination//-->
@else
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif

