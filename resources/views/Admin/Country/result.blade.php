<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Country') }}</h5>
<!--Data display of country with id-->
@if (count($country_s) > 0)
<table class="table table-striped table-bordered">  
<tr>
    <th>ID</th><th>Country</th>
	</tr>
	@foreach ($country_s as $c)
    <tr>
        <td>{{ $c->id }}</td>
		<td>{{ $c->country }}</td>
	</tr>
	@endforeach
</table>
@else
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif

