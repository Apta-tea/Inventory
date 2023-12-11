<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Unit') }}</h5>
<!--Data display of unit with id-->
@if (isset($unit))
<table class="table table-striped table-bordered">        
	<tr>
		<td>Unit</td>
		<td>{{ $unit->unit }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of unit with id//-->