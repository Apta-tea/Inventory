<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Invoice') }}</h5>
<!--Action-->
@if (isset($invoice))
<!--Data display of invoices-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Invoice No</th>
		<th>Customer</th>
		<th>Date of invoice</th>
		<th class="text-center">Items</th>
		<th>Total Cost</th>
		<th>Amount Paid</th>
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
    @endforeach
	</tr>
</table>
@else
<!--No data-->
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->


