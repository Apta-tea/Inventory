<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Category') }}</h5>
<!--Data display of category with id-->
@if (isset($category))
<table class="table table-striped table-bordered">  
<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Status</th>
		<th>Created At</th>
		<th>Updated At</th>
	</tr>
	@foreach($category as $u)
    <tr>
		<td>{{ $u->name }}</td>
		<td>{{ $u->description }}</td>
		<td>{{ $u->status }}</td>
		<td>{{ $u->created_at }}</td>
		<td>{{ $u->updated_at }}</td>
	</tr>
    @endforeach
</table>
@else
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif

