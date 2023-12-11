<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($product))
<h5 class="font-20 mt-15 mb-1">Update Product</h5>
{{ Form::model($product, array('url' => 'product/'.$product->id, 'method' => 'patch', 'class' => 'form-horizontal','files'=>'true')) }}
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Product Name" class="col-md-4 control-label">Product Name</label>
			{{ Form::hidden('users_id',Auth::user()->id) }}
			<div class="col-md-8">
			{{ Form::text('product_name',$product->product_name,['class'=>'form-control','id'=>'product_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Category" class="col-md-4 control-label">Category</label>
			<div class="col-md-8">
			{{ Form::select('category_id',$category,null,['class'=>'form-control','id'=>'category_id']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Sub Category" class="col-md-4 control-label">Sub Category</label>
			<div class="col-md-8">
			{{ Form::select('sub_category_id',$scategory,null,['class'=>'form-control','id'=>'category_id']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Buying Price" class="col-md-4 control-label">Buying Price</label>
			<div class="col-md-8">
			{{ Form::text('buying_price',$product->buying_price,['class'=>'form-control','id'=>'buying_price']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Selling Price" class="col-md-4 control-label">Selling Price</label>
			<div class="col-md-8">
			{{ Form::text('selling_price',$product->selling_price,['class'=>'form-control','id'=>'selling_price']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Brand" class="col-md-4 control-label">Brand</label>
			<div class="col-md-8">
			{{ Form::text('brand',$product->brand,['class'=>'form-control','id'=>'brand']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Specification" class="col-md-4 control-label">Specification</label>
			<div class="col-md-8">
			{{ Form::text('specification',$product->specification,['class'=>'form-control','id'=>'specification']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Purchase Type" class="col-md-4 control-label">Purchase Type</label>
			<div class="col-md-8">
			{{ Form::text('purchaseType',$product->purchaseType,['class'=>'form-control','id'=>'purchaseType']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Asset Type" class="col-md-4 control-label">Asset Type</label>
			<div class="col-md-8">
			{{ Form::text('assetType',$product->assetType,['class'=>'form-control','id'=>'assetType']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Serial Number" class="col-md-4 control-label">Serial Number</label>
			<div class="col-md-8">
			{{ Form::text('serial_number',$product->serial_number,['class'=>'form-control','id'=>'serial_number']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Barcode Number" class="col-md-4 control-label">Barcode Number</label>
			<div class="col-md-8">
			{{ Form::text('barcodeNumber',$product->barcodeNumber,['class'=>'form-control','id'=>'barcodeNumber']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
			{{ Form::text('description',$product->description,['class'=>'form-control','id'=>'description']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8">
			{{ Form::select('unit',$unit,null,['class'=>'form-control','id'=>'unit', 'placeholder' => '--Select--']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Quantity Per Unit</label>
			<div class="col-md-8">
			{{ Form::text('qty',$product->qty,['class'=>'form-control','id'=>'qty']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Selling Price" class="col-md-4 control-label">File Picture</label>
			<div class="col-md-8">
			{{ Form::file('file_picture',null,['class'=>'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
			{{ Form::select('status',['active'=>'active','inactive'=>'inactive'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Update</button>
	</div>
</div>
{{ Form::close() }}
@else
<h5 class="font-20 mt-15 mb-1">Save Product</h5>
{{ Form::open(array('url'=>'product', 'class' => 'form-horizontal', 'files' => 'true')) }}
<div class="card">
	<div class="card-body">
	<div class="form-group">
			<label for="Product Name" class="col-md-4 control-label">Product Name</label>
			{{ Form::hidden('users_id',Auth::user()->id) }}
			<div class="col-md-8">
			{{ Form::text('product_name',null,['class'=>'form-control','id'=>'product_name']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Category" class="col-md-4 control-label">Category</label>
			<div class="col-md-8">
			{{ Form::select('category_id',$category,null,['class'=>'form-control','id'=>'category_id', 'placeholder' => '--Select--']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Sub Category" class="col-md-4 control-label">Sub Category</label>
			<div class="col-md-8">
			{{ Form::select('sub_category_id',$scategory,null,['class'=>'form-control','id'=>'category_id', 'placeholder' => '--Select--']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Buying Price" class="col-md-4 control-label">Buying Price</label>
			<div class="col-md-8">
			{{ Form::text('buying_price',null,['class'=>'form-control','id'=>'buying_price']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Selling Price" class="col-md-4 control-label">Selling Price</label>
			<div class="col-md-8">
			{{ Form::text('selling_price',null,['class'=>'form-control','id'=>'selling_price']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Brand" class="col-md-4 control-label">Brand</label>
			<div class="col-md-8">
			{{ Form::text('brand',null,['class'=>'form-control','id'=>'brand']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Specification" class="col-md-4 control-label">Specification</label>
			<div class="col-md-8">
			{{ Form::text('specification',null,['class'=>'form-control','id'=>'specification']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Purchase Type" class="col-md-4 control-label">Purchase Type</label>
			<div class="col-md-8">
			{{ Form::text('purchaseType',null,['class'=>'form-control','id'=>'purchaseType']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Asset Type" class="col-md-4 control-label">Asset Type</label>
			<div class="col-md-8">
			{{ Form::text('assetType',null,['class'=>'form-control','id'=>'assetType']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Serial Number" class="col-md-4 control-label">Serial Number</label>
			<div class="col-md-8">
			{{ Form::text('serial_number',null,['class'=>'form-control','id'=>'serial_number']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Barcode Number" class="col-md-4 control-label">Barcode Number</label>
			<div class="col-md-8">
			{{ Form::text('barcodeNumber',null,['class'=>'form-control','id'=>'barcodeNumber']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
			{{ Form::text('description',null,['class'=>'form-control','id'=>'description']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Unit" class="col-md-4 control-label">Unit</label>
			<div class="col-md-8">
			{{ Form::select('unit',$unit,null,['class'=>'form-control','id'=>'unit', 'placeholder' => '--Select--']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Quantity Per Unit</label>
			<div class="col-md-8">
			{{ Form::text('qty',null,['class'=>'form-control','id'=>'qty']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Selling Price" class="col-md-4 control-label">File Picture</label>
			<div class="col-md-8">
			{{ Form::file('file_picture',null,['class'=>'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
			{{ Form::select('status',['active'=>'active','inactive'=>'inactive'], null, ['placeholder' => '--Select--', 'class' => 'form-control', 'required']) }}
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success">Save</button>
	</div>
</div>
{{ Form::close() }}
@endif
