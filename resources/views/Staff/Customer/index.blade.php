<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Customer') }}</h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="{{ ('customer/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
            {{ Form::open(array('url'=>'customer/search','class'=>'form-horizontal','role'=>'search')) }}
            {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'required']) }} 
			{{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
            {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of customer-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Customer Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Phone No</th>
		<th>Action</th>
	</tr>
	@foreach($customer as $u)
    <tr>
		<td>{{ $u->customer_name }}</td>
		<td>{{ $u->email }}</td>
		<td>{{ $u->address }}</td>
		<td>{{ $u->phone_no }}</td>
		<td><a
			href="{{ ('customer/'.$u->id) }}"
			class="action-icon"> <i class="fa fa-eye"></i></a> <a
			href="{{ ('customer/'.$u->id.'/edit') }}"
			class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'customer/'.$u->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
		</td>
	</tr>
    @endforeach
</table>
<!--End of Data display of customer//-->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!--No data-->
@if (count($customer) == 0) 
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->

<!--Pagination-->
{{ $customer->links() }}
<!--End of Pagination//-->