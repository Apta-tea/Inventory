<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">Product Detail</h5>
<table class="table table-striped table-bordered">
	<tr>
		<td>Users</td>
		<td>
			@php 
			$n=App\Models\User::where('id',$product->users_id)->first();
			echo $n->email;
			@endphp
		</td>
	</tr>
	<tr>
		<td>Product Name</td>
		<td>{{ $product->product_name }}</td>
	</tr>
	<tr>
		<td>Category</td>
		<td>
			@php 
			if (!empty($product->category_id)){
			$n=App\Models\Category::where('id',$product->category_id)->first();
			echo $n->name;
			}else{
			echo '';	
			}
			@endphp
		</td>
	</tr>
	<tr>
		<td>Sub Category</td>
		<td>
			@php
			if (!empty($product->sub_category_id)){ 
			$n=App\Models\Sub_category::where('id',$product->sub_category_id)->first();
			echo $n->name;
			}
			@endphp
		</td>
	</tr>
	<tr>
		<td>Buying Price</td>
		<td>{{ $product->buying_price }}</td>
	</tr>
	<tr>
		<td>Selling Price</td>
		<td>{{ $product->selling_price }}</td>
	</tr>
	<tr>
		<td>Brand</td>
		<td>{{ $product->brand }}</td>
	</tr>
	<tr>
		<td>Specification</td>
		<td>{{ $product->specification }}</td>
	</tr>
	<tr>
		<td>Purchase Type</td>
		<td>{{ $product->purchaseType }}</td>
	</tr>
	<tr>
		<td>Asset Type</td>
		<td>{{ $product->assetType }}</td>
	</tr>
	<tr>
		<td>Serial Number</td>
		<td>{{ $product->serial_number }}</td>
	</tr>
	<tr>
		<td>Barcode Number</td>
		<td>{{ $product->barcodeNumber }}</td>
	</tr>
	<tr>
		<td>Description</td>
		<td>{{ $product->description }}</td>
	</tr>
	<tr>
		<td>Unit</td>
		<td>
			@php
			if (!empty($product->unit)){ 
			$n=App\Models\Unit::where('id',$product->unit)->first();
			echo $n->unit;
			}
			@endphp
		</td>
	</tr>
	<tr>
		<td>Quantity Per Unit</td>
		<td>{{ $product->qty }}</td>
	</tr>
	<tr>
		<td>File Picture</td>
		<td>
                @if (!empty($product->file_picture) && File::exists(public_path().'/assets/'.$product->file_picture))
					  <img src="{{ asset('/assets/'.$product->file_picture) }}" class='picture_100x100'>
                @else
					<img src="{{ public_path().'/assets/uploads/no_image.jpg' }}" class='picture_100x100'>
				@endif
        </td>
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{ $product->created_at }}</td>
	</tr>
	<tr>
		<td>Updated At</td>
		<td>{{ $product->updated_at }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{ $product->status }}</td>
	</tr>
</table>