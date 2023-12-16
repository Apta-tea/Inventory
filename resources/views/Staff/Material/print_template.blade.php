<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<h3>{{ str_replace('_',' ','Issued Material') }}</h3>
Date: {{ date("Y-m-d") }}
<hr>
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
        <td>No.</td>
		<td>Issued No.</td>
		<td>Receive By</td>
		<td>Issued Date</td>
		<td>Description</td>
		<td>Internal Notes</td>
		<td>Operator</td>
		<td>Amount</td>
	</tr>
@php
    $sl_no=0;
@endphp
@foreach ($material as $c)
@php
	   $sl_no = $sl_no+1;
@endphp
    <tr>
        <td>{{ $sl_no }}.</td>
		<td>{{ $c->issued_no }}</td>
		<td>
            @php
            $p = App\Models\Company::where('id',$c->company_id)->value('company_name');
            @endphp
            {{ $p }}
		</td>
		<td>{{ $c->issued_date }}</td>
		<td>{{ $c->description }}</td>
		<td>{{ $c->internal_notes }}</td>
		<td>
		@php
            $e = App\Models\User::where('id',$c->user_id)->value('email');
            @endphp
            {{ $e }}
		</td>
		<td>{{ $c->amount }}</td>
	</tr>
	<tr></tr>
	<tr>
        <td></td>
		<td>Items</td>
		<td colspan="6">
			<table border="1" class="table" align="center" width="100%">
				<tr>
					<td>Product</td>
					<td>Item Price</td>
					<td>Item Quantity</td>
					<td>Item Total</td>
				</tr>
				@php
				$item = App\Models\Item_material::where('issued_id',$c->id)->get();
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

<!--End of Data display of material//-->
