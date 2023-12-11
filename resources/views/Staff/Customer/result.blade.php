<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Customer') }}</h5>
<!--Data display of customer with id-->
@if (isset($customer))
<table class="table table-striped table-bordered">  
<tr>
		<th>Customer Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>phone_no</th>
		<th>Created At</th>
		<th>Updated At</th>
	</tr>
	@foreach($customer as $u)
    <tr>
		<td>{{ $u->customer_name }}</td>
		<td>{{ $u->email }}</td>
		<td>{{ $u->address }}</td>
		<td>{{ $u->phone_no }}</td>
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

