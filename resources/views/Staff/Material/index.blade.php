<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Raw Material') }}</h5>
<!--Action-->
@if (isset($material))
<div>
	<div class="float_left padding_10">
		<a href="{{ ('material/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='{{ ('material/export') }}/'+this.value">
			<option>Select..</option>
			<option value="1">Pdf</option>
			<option value="2">Xlsx</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                {{ Form::open(array('url'=>'material/search','class'=>'form-horizontal','role'=>'search')) }}
                {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'placeholder'=>'issued no..', 'required']) }} 
                {{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
                {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of material-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Issued No.</th>
		<th>Company</th>
		<th>Issued Date</th>
		<th class="text-center">Items</th>
		<th>Description</th>
		<th>Amount</th>
		<th>Actions</th>
	</tr>
	@foreach($material as $c)
    <tr>
		<td>{{ $c->issued_no }}</td>
		<td>
			@php 
			$n = App\Models\Company::where('id',$c->company_id)->first();
			echo $n->company_name;
			@endphp
		</td>
		<td>{{ $c->issued_date }}</td>
		<td valign="top">
			<table>
				<tr>
					<th>Product</th>
					<th>Item Price</th>
					<th>Item Quantity</th>
					<th>Item Total</th>
				</tr>
				@php
				$item = App\Models\Item_material::where('issued_id',$c->id)->get();
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
		<td>{{ $c->description }}</td>
		<td>{{ number_format($c->amount) }}</td>
		<td>
            <a href="{{ ('material/'.$c->id) }}" class="action-icon"> <i class="fa fa-eye"></i></a> 
            <a href="{{ ('material/'.$c->id.'/edit') }}" class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'material/'.$c->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
			<a href="{{ ('material/download/'.$c->id) }}" class="action-icon" target="_blank"> <i class="fa fa-print"></i></a>
        </td>
    @endforeach
	</tr>
</table>
<!--End of Data display of material//-->
<!--Pagination-->
{{ $material->links() }}
<!--End of Pagination//-->
@else
<!--No data-->
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<!--End of No data//-->


