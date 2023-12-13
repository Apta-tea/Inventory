<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Manufacture') }}</h5>
<!--Action-->
@if (isset($manufacture))
<div>
	<div class="float_left padding_10">
		<a href="{{ ('manufacture/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='{{ ('manufacture/export') }}/'+this.value">
			<option>Select..</option>
			<option value="1">Pdf</option>
			<option value="2">Xlsx</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                {{ Form::open(array('url'=>'manufacture/search','class'=>'form-horizontal','role'=>'search')) }}
                {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'placeholder'=>'Production no..', 'required']) }} 
                {{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
                {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of manufacture-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Production No.</th>
		<th>Manufacturer</th>
		<th>Stored Date</th>
		<th class="text-center">Items</th>
		<th>Description</th>
		<th>Amount</th>
		<th>Actions</th>
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
            <a href="{{ ('manufacture/'.$c->id) }}" class="action-icon"> <i class="fa fa-eye"></i></a> 
            <a href="{{ ('manufacture/'.$c->id.'/edit') }}" class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'manufacture/'.$c->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
			<a href="{{ ('manufacture/download/'.$c->id) }}" class="action-icon" target="_blank"> <i class="fa fa-print"></i></a>
        </td>
    @endforeach
	</tr>
</table>
<!--End of Data display of manufacture//-->
<!--Pagination-->
{{ $manufacture->links() }}
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


