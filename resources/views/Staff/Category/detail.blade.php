<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','category') }}</h5>
<!--Data display of category with id-->
@if (isset($category))
<table class="table table-striped table-bordered">        
<tr>
		<td>Name</td>
		<td>{{ $category->name }}</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $category->description }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{ $category->status }}</td>
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{ $category->created_at }}</td>
	</tr>
	<tr>
		<td>Updated At</td>
		<td>{{ $category->updated_at }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of category with id//-->