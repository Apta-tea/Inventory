<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Sub category') }}</h5>
<!--Data display of scategory with id-->
@if (isset($scategory))
<table class="table table-striped table-bordered">
	<tr>
		<td>Category</td>
		<td>
			@php 
			$n=App\Models\Category::where('id',$scategory->category_id)->first();
			echo $n->name;
			@endphp
		</td>
	</tr>        
	<tr>
		<td>Name</td>
		<td>{{ $scategory->name }}</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $scategory->description }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{ $scategory->status }}</td>
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{ $scategory->created_at }}</td>
	</tr>
	<tr>
		<td>Updated At</td>
		<td>{{ $scategory->updated_at }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of scategory with id//-->