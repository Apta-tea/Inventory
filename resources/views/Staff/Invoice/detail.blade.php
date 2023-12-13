<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Invoice') }}</h5>
<!--Data display of invoice with id-->
@if(isset($invoice))
<table class="table table-striped table-bordered">
	<tr>
		<td>invoice No</td>
		<td>{{ $invoice->invoice_no }}</td>
	</tr>
	<tr>
		<td>Customer</td>
		<td>
            @php 
			$n = App\Models\Customer::where('id',$invoice->customers_id)->value('customer_name');
			echo $n;
			@endphp
	</td>
	</tr>
	<tr>
		<td valign="top">Items</td>
		<td valign="top">
			<table>
				<tr>
					<th>Product</th>
					<th>Item Cost</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
                @php
				$item = App\Models\Item_invoice::where('invoice_id',$invoice->id)->get();
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
	</tr>
	<tr>
		<td>Date Of invoice</td>
		<td>{{ $invoice->date_of_invoice }}</td>
	</tr>
	<tr>
		<td>Users</td>
		<td>
            @php
            $p = App\Models\User::where('id',$invoice->users_id)->value('email');
            echo $p;
            @endphp
	</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $invoice->description }}</td>
	</tr>
	<tr>
		<td>Internal Notes</td>
		<td>{{ $invoice->internal_notes }}</td>
	</tr>
	<tr>
		<td>Total Cost</td>
		<td>{{ number_format($invoice->total_cost) }}</td>
	</tr>
	<tr>
		<td>Amount Paid</td>
		<td>{{ number_format($invoice->amount_paid) }}</td>
	</tr>
</table>
@else
<div align="center">
<h3>Data is not exists</h3>
@endif
<!--End of Data display of invoice with id//-->
