<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Country') }}</h5>
<!--Data display of country with id-->
@if (isset($country))
<table class="table table-striped table-bordered">        
	<tr>
		<td>Country</td>
		<td>{{ $country->country }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of country with id//-->