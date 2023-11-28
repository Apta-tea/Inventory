<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Products') }}</h5>
<!--Action-->
@if (isset($product))
<!--Data display of products-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Product Name</th>
		<th>Category</th>
		<th>Sub Category</th>
		<th>Buying Price</th>
		<th>Selling Price</th>
		<th>Brand</th>
		<th>File Picture</th>
		<th>Status</th>
	</tr>
	@foreach($product as $c)
    <tr>
	<td>{{ $c->product_name }}</td>
		<td>
			@php 
			$n=App\Models\Category::where('id',$c->category_id)->first();
			echo $n->name;
			@endphp
		</td>
		<td>
			@php 
			$n=App\Models\Sub_category::where('id',$c->sub_category_id)->first();
			echo $n->name;
			@endphp
		</td>
		<td>{{ $c->buying_price }}</td>
		<td>{{ $c->selling_price }}</td>
		<td>{{ $c->brand }}</td>
		<td>
            @if (!empty($c->file_picture) && File::exists(public_path().'/assets/'.$c->file_picture))
                <img src="{{ asset('/assets/'.$c->file_picture) }}" class='picture_50x50'>
            @else
                <img src="{{ public_path().'/assets/uploads/no_image.jpg' }}" class='picture_50x50'>
            @endif
        </td>
		<td>{{ $c->status }}</td>
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


