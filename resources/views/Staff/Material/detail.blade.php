<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Declared Material') }}</h5>
<!--Data display of material with id-->
@if(isset($material))
<table class="table table-striped table-bordered">
	<tr>
		<td>Issued No</td>
		<td>{{ $material->issued_no }}</td>
	</tr>
	<tr>
		<td>Manufacturer</td>
		<td>
			@php 
			$n = App\Models\Company::where('id',$material->company_id)->value('company_name');
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
					<th>Item Price</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
                @php
				$item = App\Models\Item_material::where('issued_id',$material->id)->get();
				@endphp
				@foreach ($item as $i) 
                   <tr>
					<td>
					@php
					$p = App\Models\Product::where('id',$i->product_id)->first();
					echo $p->product_name;
					@endphp
                    </td>
					<td>{{ number_format($i->item_price) }}</td>
					<td>{{ number_format($i->item_quantity) }}</td>
					<td>{{ number_format($i->item_total) }}</td>
				</tr>
                @endforeach
            </table>
		</td>
	</tr>
	<tr>
		<td>Issued Date</td>
		<td>{{ $material->issued_date }}</td>
	</tr>
	<tr>
		<td>Users</td>
		<td>
            @php
            $p = App\Models\User::where('id',$material->user_id)->value('email');
            echo $p;
            @endphp
	</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $material->description }}</td>
	</tr>
	<tr>
		<td>Internal Notes</td>
		<td>{{ $material->internal_notes }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>{{ $material->amount }}</td>
	</tr>
</table>
@else
<div align="center">
<h3>Data is not exists</h3>
@endif
<!--End of Data display of material with id//-->
