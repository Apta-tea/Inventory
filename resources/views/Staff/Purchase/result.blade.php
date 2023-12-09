<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Purchase') }}</h5>
<!--Action-->
@if (isset($purchase))
<!--Data display of purchases-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Purchase No</th>
		<th>Supplier</th>
		<th>Date of Purchase</th>
		<th class="text-center">Items</th>
		<th>Total Cost</th>
		<th>Amount Paid</th>
	</tr>
	@foreach($purchase as $c)
    <tr>
		<td>{{ $c->purchase_no }}</td>
		<td>
			@php 
			$n = App\Models\Supplier::where('id',$c->supplier_id)->first();
			echo $n->company;
			@endphp
		</td>
		<td>{{ $c->date_of_purchase }}</td>
		<td valign="top">
			<table>
				<tr>
					<th>Product</th>
					<th>Item Cost</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
				@php
				$item = App\Models\Item_purchase::where('purchase_id',$c->id)->get();
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


