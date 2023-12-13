<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Manufacture') }}</h5>
<!--Action-->
@if (isset($manufacture))
<!--Data display of manufactures-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Production No.</th>
		<th>Manufacturer</th>
		<th>Stored Date</th>
		<th class="text-center">Items</th>
		<th>Description</th>
		<th>Amount</th>
	</tr>
	@foreach($manufacture as $c)
    <tr>
		<td>{{ $c->production_no }}</td>
		<td>
			@php 
			$n = App\Models\Company::where('id',$c->supplier_id)->first();
			echo $n->company_name;
			@endphp
		</td>
		<td>{{ $c->stored_date }}</td>
		<td valign="top">
			<table>
				<tr>
					<th>Product</th>
					<th>Item Price</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
				@php
				$item = App\Models\Production::where('stored_id',$c->id)->get();
				@endphp
				@foreach ($item as $i) 
                   <tr>
					<td>
					@php
					$p = App\Models\Product::where('id',$i->product_id)->value('product_name');
					echo $p;
					@endphp
                    </td>
					<td>{{ number_format($i->item_price) }}</td>
					<td>{{ number_format($i->item_quantity) }}</td>
					<td>{{ number_format($i->item_total) }}</td>
				</tr>
                @endforeach
            </table>
		</td>
		<td>{{ $c->description }}</td>
		<td>{{ number_format($c->amount) }}</td>
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


