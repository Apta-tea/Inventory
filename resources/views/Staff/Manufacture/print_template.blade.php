<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<h3>{{ str_replace('_',' ','Manufacture') }}</h3>
Date: {{ date("Y-m-d") }}
<hr>
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
        <td>No.</td>
		<td>Production No.</td>
		<td>Stored By</td>
		<td>Stored Date</td>
		<td>Description</td>
		<td>Internal Notes</td>
		<td>Amount</td>
	</tr>
@php
    $sl_no=0;
@endphp
@foreach ($manufacture as $c)
@php
	   $sl_no = $sl_no+1;
@endphp
    <tr>
        <td>{{ $sl_no }}.</td>
		<td>{{ $c->production_no }}</td>
		<td>
            @php
            $p = App\Models\Company::where('id',$c->supplier_id)->value('company_name');
            @endphp
            {{ $p }}
		</td>
		<td>{{ $c->stored_date }}</td>
		<td>{{ $c->description }}</td>
		<td>{{ $c->internal_notes }}</td>
		<td>{{ $c->amount }}</td>
	</tr>
	<tr></tr>
	<tr>
        <td></td>
		<td>Items</td>
		<td colspan="5">
			<table border="1" class="table" align="center" width="100%">
				<tr>
					<td>Product</td>
					<td>Item Price</td>
					<td>Item Quantity</td>
					<td>Item Total</td>
				</tr>
				@php
				$item = App\Models\Production::where('stored_id',$c->id)->get();
				@endphp
				@for ($i = 0; $i < count($item); $i ++)
				<tr>
						<td>
						@php
						$p = App\Models\Product::where('id',$item[$i]->product_id)->value('product_name');
						echo $p;
						@endphp
						</td>
						<td>{{ $item[$i]->item_price }}</td>
						<td>{{ $item[$i]->item_quantity }}</td>
						<td>{{ $item[$i]->item_total }}</td>
					</tr>
				@endfor
			</table>
		</td>
	</tr>
@endforeach
</table>

<!--End of Data display of manufacture//-->
