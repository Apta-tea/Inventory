<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<h3>{{ str_replace('_',' ','Purchase') }}</h3>
Date: {{ date("Y-m-d") }}
<hr>
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
        <th>Sl No</th>
		<th>purchase No</th>
		<th>Supplier</th>
		<th>Date Of purchase</th>
		<th>Description</th>
		<th>Total Cost</th>
		<th>Amount Paid</th>
	</tr>
@php
    $sl_no=0;
@endphp
@foreach ($purchase as $c)
@php
	   $sl_no = $sl_no+1;
@endphp
    <tr>
        <td>{{ $sl_no }}.</td>
		<td>{{ $c->purchase_no }}</td>
		<td>
            @php
            $p = App\Models\Supplier::where('id',$c->supplier_id)->value('supplier_name');
            @endphp
            {{ $p }}
		</td>
		<td>{{ $c->date_of_purchase }}</td>
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
				$item = App\Models\Item_purchase::where('purchase_id',$c->id)->get();
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
<!--End of Data display of purchase//-->
