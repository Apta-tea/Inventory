<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Purchase') }}</h5>
<!--Data display of purchase with id-->
@if(isset($purchase))
<table class="table table-striped table-bordered">
	<tr>
		<td>Purchase No</td>
		<td>{{ $purchase->purchase_no }}</td>
	</tr>
	<tr>
		<td>Supplier</td>
		<td>
            @php 
			$n = App\Models\Supplier::where('id',$purchase->supplier_id)->value('company');
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
				$item = App\Models\Item_purchase::where('purchase_id',$purchase->id)->get();
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
		<td>Date Of Purchase</td>
		<td>{{ $purchase->date_of_purchase }}</td>
	</tr>
	<tr>
		<td>Users</td>
		<td>
            @php
            $p = App\Models\User::where('id',$purchase->users_id)->value('email');
            echo $p;
            @endphp
	</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $purchase->description }}</td>
	</tr>
	<tr>
		<td>Internal Notes</td>
		<td>{{ $purchase->internal_notes }}</td>
	</tr>
	<tr>
		<td>Total Cost</td>
		<td>{{ number_format($purchase->total_cost) }}</td>
	</tr>
	<tr>
		<td>Amount Paid</td>
		<td>{{ number_format($purchase->amount_paid) }}</td>
	</tr>
</table>
@else
<div align="center">
<h3>Data is not exists</h3>
@endif
<!--End of Data display of purchase with id//-->
