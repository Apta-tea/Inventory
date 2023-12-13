<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<h3>{{ str_replace('_',' ','Invoice') }}</h3>
Date: {{ date("Y-m-d") }}
<hr>
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
        <th>Sl No.</th>
		<th>Invoice No</th>
		<th>Customers</th>
		<th>Date Of Invoice</th>
		<th>Description</th>
		<th>Total Cost</th>
		<th>Amount Paid</th>
	</tr>
@php
    $sl_no=0;
@endphp
@foreach ($invoice as $c)
@php
	   $sl_no = $sl_no+1;
@endphp
    <tr>
        <td>{{ $sl_no }}.</td>
		<td>{{ $c->invoice_no }}</td>
		<td>
            @php
            $p = App\Models\Customer::where('id',$c->customers_id)->value('customer_name');
            @endphp
            {{ $p }}
		</td>
		<td>{{ $c->date_of_invoice }}</td>
		<td>{{ $c->description }}</td>
		<td>{{ $c->total_cost }}</td>
		<td>{{ $c->amount_paid }}</td>
	</tr>
	<tr></tr>
	<tr>
        <td></td>
		<td>Items</td>
		<td colspan="5">
			<table border="1" class="table" align="center" width="100%">
				<tr>
					<td>Product</td>
					<td>Item Cost</td>
					<td>Item Quantity</td>
					<td>Item Total</td>
				</tr>
				@php
				$item = App\Models\Item_invoice::where('invoice_id',$c->id)->get();
				@endphp
				@for ($i = 0; $i < count($item); $i ++)
				<tr>
					<td>
					@php
					$p = App\Models\Product::where('id',$item[$i]->product_id)->value('product_name');
					echo $p;
					@endphp
					</td>
					<td>{{ $item[$i]->item_cost }}</td>
					<td>{{ $item[$i]->item_quantity }}</td>
					<td>{{ $item[$i]->item_total }}</td>
				</tr>
			@endfor
			</table>
		</td>
	</tr>
@endforeach
</table>
<!--End of Data display of invoice//-->
