<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Supplier') }}</h5>
<!--Data display of supplier with id-->
@if (isset($supplier))
<table class="table table-striped table-bordered">        
<tr>
		<td>Company</td>
		<td>{{ $supplier->company }}</td>
	</tr>
	<tr>
		<td>Supplier Name</td>
		<td>{{ $supplier->supplier_name }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ $supplier->email }}</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ $supplier->address }}</td>
	</tr>
	<tr>
		<td>City</td>
		<td>{{ $supplier->city }}</td>
	</tr>
	<tr>
		<td>State</td>
		<td>{{ $supplier->state }}</td>
	</tr>
	<tr>
		<td>Zip</td>
		<td>{{ $supplier->zip }}</td>
	</tr>
	<tr>
		<td>Phone No</td>
		<td>{{ $supplier->phone_no }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of supplier with id//-->