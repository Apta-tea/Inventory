<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Customer') }}</h5>
<!--Data display of customer with id-->
@if (isset($customer))
<table class="table table-striped table-bordered">        
<tr>
		<td>Customer Name</td>
		<td>{{ $customer->customer_name }}</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>{{ $customer->email }}</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ $customer->address }}</td>
	</tr>
	<tr>
		<td>City</td>
		<td>{{ $customer->city }}</td>
	</tr>
	<tr>
		<td>State</td>
		<td>{{ $customer->state }}</td>
	</tr>
	<tr>
		<td>Zip</td>
		<td>{{ $customer->zip }}</td>
	</tr>
	<tr>
		<td>Phone No</td>
		<td>{{ $customer->phone_no }}</td>
	</tr>
</table>
@else	
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of Data display of customer with id//-->