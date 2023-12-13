<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Invoice') }}</h5>
<!--Action-->
@if (isset($invoice))
<div>
	<div class="float_left padding_10">
		<a href="{{ ('invoice/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='{{ ('invoice/export') }}/'+this.value">
			<option>Select..</option>
			<option value="1">Pdf</option>
			<option value="2">Xlsx</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                {{ Form::open(array('url'=>'invoice/search','class'=>'form-horizontal','role'=>'search')) }}
                {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'placeholder'=>'invoice no..', 'required']) }} 
                {{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
                {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of invoice-->
<table class="table table-striped table-bordered">
	<tr>
		<th>invoice No.</th>
		<th>Customers</th>
		<th>Date of invoice</th>
		<th class="text-center">Items</th>
		<th>Total Cost</th>
		<th>Amount Paid</th>
		<th>Actions</th>
	</tr>
	@foreach($invoice as $c)
    <tr>
		<td>{{ $c->invoice_no }}</td>
		<td>
			@php 
			$n = App\Models\Customer::where('id',$c->customers_id)->first();
			echo $n->customer_name;
			@endphp
		</td>
		<td>{{ $c->date_of_invoice }}</td>
		<td valign="top">
			<table>
				<tr>
					<th>Product</th>
					<th>Item Cost</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
				@php
				$item = App\Models\Item_invoice::where('invoice_id',$c->id)->get();
				@endphp
				@foreach ($item as $i) 
                   <tr>
					<td>
					@php
					$p = App\Models\Product::where('id',$i->product_id)->first();
					echo $p->product_name;
					@endphp
                    </td>
					<td>{{ number_format($i->item_cost) }}</td>
					<td>{{ number_format($i->item_quantity) }}</td>
					<td>{{ number_format($i->item_total) }}</td>
				</tr>
                @endforeach
            </table>
		</td>
		<td>{{ number_format($c->total_cost) }}</td>
		<td>{{ number_format($c->amount_paid) }}</td>
		<td>
            <a href="{{ ('invoice/'.$c->id) }}" class="action-icon"> <i class="fa fa-eye"></i></a> 
            <a href="{{ ('invoice/'.$c->id.'/edit') }}" class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'invoice/'.$c->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
			<a href="{{ ('invoice/download/'.$c->id) }}" class="action-icon" target="_blank"> <i class="fa fa-print"></i></a>
        </td>
    @endforeach
	</tr>
</table>
<!--End of Data display of invoice//-->
<!--Pagination-->
{{ $invoice->links() }}
<!--End of Pagination//-->
@else
<!--No data-->
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!--End of No data//-->


