<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
@if (isset($purchase))
<h5 class="font-20 mt-15 mb-1">Update purchase</h5>
<!--*****************************************************
  Reuse item tempalte to make product item
******************************************************-->
<!--Item Form Template-->
<div id="item_form_template" class="row hide">
	<div class="row item  index0">
		<div class="form-group">
			<label for="Product" class="col-md-12 control-label">Product</label>
			<div class="col-md-12">
				{{ Form::select('product_id[]',$product,'',['class'=>'form-control','id'=>'product_id_0', 'onChange'=>'setCost(this.value,0);']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Item Cost" class="col-md-12 control-label">Item Cost</label>
			<div class="col-md-12">
			{{ Form::text('item_cost[]','',['class'=>'form-control','id'=>'item_cost_0']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Item Quantity" class="col-md-12 control-label">Item Quantity</label>
			<div class="col-md-12">
			{{ Form::text('item_quantity[]','1',['class'=>'form-control','id'=>'item_quantity_0', 'onBlur'=>'setItemTotal(this.value,this.id);']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Item Total" class="col-md-12 control-label">Item Total</label>
			<div class="col-md-12">
			{{ Form::text('item_total[]','',['class'=>'form-control','id'=>'item_total_0']) }}
			{{ Form::hidden('item_purchase_id','',['id'=>'item_purchase_id_0']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="removeitem" onClick="removeItem(0);">
				<a href="javascript:void();" class="action-icon"><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
</div>
<!--End of Item Form Template//-->

<!--Form to save data-->
{{ Form::model($purchase, array('url' => 'purchase/'.$purchase->id, 'method' => 'patch', 'class' => 'form-horizontal')) }}
<!--Item Form-->
<h4 class="card-title mb-0">Items</h4>
<div class="card">
	<div class="card-body">
		<div id="item_more" class="row"></div>
		<button type="button" onClick="addMore(event);" class="btn btn-danger">
			<i class="zmdi zmdi-plus"></i>Add more Item
		</button>
	</div>
</div>
@foreach ($item_purchase as $i )
<script language="javascript">
    $(document).ready(function() {
            addMore(event);
            $("#product_id_{{ $loop->index+1 }}").val({{ $i->product_id }});
            $("#item_cost_{{ $loop->index+1 }}").val({{ $i->item_cost }});
            $("#item_quantity_{{ $loop->index+1 }}").val({{ $i->item_quantity }});
            $("#item_total_{{ $loop->index+1 }}").val({{ $i->item_total }}); 
			$("#item_purchase_id_{{ $loop->index+1 }}").val({{ $i->id }}); 
        
    });
</script>
@endforeach
<h4 class="card-title mb-0">Supplier Info</h4>
			@php 
			$p=App\Models\Supplier::where('id',$purchase->supplier_id)->first();
			@endphp
<div class="card">
  <div class="card-body">
  <div class="row">
    <div class="col-md-4">
        <label for="Supplier" class="col-md-4 control-label">Company</label>
        <div class="col-md-8">
		{{ Form::select('supplier_id',$supplier,"$p->id",['class'=>'form-control','id'=>'supplier_id']) }}
        </div>
	</div>
     <div class="col-md-4">
        <label for="Supplier name" class="col-md-8 control-label">Supplier name</label>
        <div class="col-md-8">
		{{ Form::text('supplier_name',"$p->supplier_name",['class'=>'form-control','id'=>'supplier_name','readonly']) }}
   		 </div>
    </div>
    <div class="col-md-4">
        <label for="Email" class="col-md-4 control-label">Email</label>
        <div class="col-md-8">
		{{ Form::text('email',"$p->email",['class'=>'form-control','id'=>'email']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="Address" class="col-md-4 control-label">Address</label>
        <div class="col-md-8">
		{{ Form::textarea('address',"$p->address",['class'=>'form-control','id'=>'address']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="City" class="col-md-4 control-label">City</label>
        <div class="col-md-8">
		{{ Form::text('city',"$p->city",['class'=>'form-control','id'=>'city']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="Phone No" class="col-md-4 control-label">Phone No</label>
        <div class="col-md-8">
		{{ Form::text('phone_no',"$p->phone_no",['class'=>'form-control','id'=>'phone_no']) }}
        </div>
    </div>
 </div>
 </div>
</div>
<!--Hidden field-->
{{ Form::hidden('track_purchase_id',$purchase->id) }}
{{ Form::hidden('users_id',Auth::user()->id) }}
{{ Form::hidden('jml_itemP',count($item_purchase)) }}

<h4 class="card-title mb-0">Purchase Info</h4>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Date Of Purchase" class="col-md-4 control-label">Date Of Purchase</label>
			<div class="col-md-8">
			{{ Form::text('date_of_purchase',"$purchase->date_of_purchase",['class'=>'form-control datepicker','id'=>'date_of_purchase']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
			{{ Form::textarea('description',"$purchase->description",['class'=>'form-control','id'=>'description', 'rows'=>'4']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Internal Notes" class="col-md-4 control-label">Internal Notes</label>
			<div class="col-md-8">
			{{ Form::textarea('internal_notes',"$purchase->internal_notes",['class'=>'form-control','id'=>'internal_notes', 'rows'=>'4']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Total Cost" class="col-md-4 control-label">Total Cost</label>
			<div class="col-md-8">
			{{ Form::text('total_cost',"$purchase->total_cost",['class'=>'form-control','id'=>'total_cost']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Amount P" class="col-md-4 control-label">Amount Paid</label>
			<div class="col-md-8">
			{{ Form::text('amount_paid',"$purchase->amount_paid",['class'=>'form-control','id'=>'amount_paid']) }}
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
<h5 class="font-20 mt-15 mb-1">Save purchase</h5>
<!--Item Form Template-->
<div id="item_form_template" class="row hide">
	<div class="row item  index0">
		<div class="form-group">
			<label for="Product" class="col-md-12 control-label">Product</label>
			<div class="col-md-12">
			<select type="text" name="product_id[]" id="product_id_0"
					class="form-control" onChange="setCost(this.value,0);" required >
				<option>--Select--</option>
                    @for ($i = 0; $i < count($product); $i ++) 
                      <option value="{{ $product[$i]->id }}">{{ $product[$i]->product_name }}</option>
                    @endfor
                </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Item Cost" class="col-md-12 control-label">Item Cost</label>
			<div class="col-md-12">
			{{ Form::text('item_cost[]','',['class'=>'form-control','id'=>'item_cost_0']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Item Quantity" class="col-md-12 control-label">Item Quantity</label>
			<div class="col-md-12">
			{{ Form::text('item_quantity[]','1',['class'=>'form-control','id'=>'item_quantity_0', 'onBlur'=>'setItemTotal(this.value,this.id);']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Item Total" class="col-md-12 control-label">Item Total</label>
			<div class="col-md-12">
			{{ Form::text('item_total[]','',['class'=>'form-control','id'=>'item_total_0']) }}
			</div>
		</div>		
		<div class="form-group">
			<div class="removeitem" onClick="removeItem(0);">
				<a href="javascript:void();" class="action-icon"><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
</div>
<!--End of Item Form Template//-->
{{ Form::open(array('url'=>'purchase', 'class' => 'form-horizontal')) }}
<h4 class="card-title mb-0">Items</h4>
<div class="card">
	<div class="card-body">
		<div id="item_more" class="row"></div>
		<button type="button" onClick="addMore(event);" class="btn btn-danger">
			<i class="zmdi zmdi-plus"></i>Add more Item
		</button>
	</div>
</div>
<script language="javascript"> 
  $(document).ready(function() {  
   addMore(event);
   });	 
</script>
<h4 class="card-title mb-0">Supplier Info</h4>
<div class="card">
  <div class="card-body">
  <div class="row">
    <div class="col-md-4">
        <label for="Supplier" class="col-md-4 control-label">Company</label>
        <div class="col-md-8">
		{{ Form::select('supplier_id',$supplier,'',['class'=>'form-control','id'=>'supplier_id', 'placeholder'=>'--Select--', 'required']) }}
        </div>
	</div>
     <div class="col-md-4">
        <label for="Supplier name" class="col-md-8 control-label">Supplier name</label>
        <div class="col-md-8">
		{{ Form::text('supplier_name','',['class'=>'form-control','id'=>'supplier_name','readonly']) }}
   		 </div>
    </div>
    <div class="col-md-4">
        <label for="Email" class="col-md-4 control-label">Email</label>
        <div class="col-md-8">
		{{ Form::text('email','',['class'=>'form-control','id'=>'email']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="Address" class="col-md-4 control-label">Address</label>
        <div class="col-md-8">
		{{ Form::textarea('address','',['class'=>'form-control','id'=>'address']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="City" class="col-md-4 control-label">City</label>
        <div class="col-md-8">
		{{ Form::text('city','',['class'=>'form-control','id'=>'city']) }}
        </div>
    </div>
    <div class="col-md-4">
        <label for="Phone No" class="col-md-4 control-label">Phone No</label>
        <div class="col-md-8">
		{{ Form::text('phone_no','',['class'=>'form-control','id'=>'phone_no']) }}
        </div>
    </div>
 </div>
 </div>
</div>
<!--Hidden field-->
{{ Form::hidden('users_id',Auth::user()->id) }}

<h4 class="card-title mb-0">Purchase Info</h4>
<div class="card">
	<div class="card-body">
	<div class="form-group">
			<label for="Purchase Number" class="col-md-4 control-label">Purchase Number</label>
			<div class="col-md-8">
			{{ Form::text('purchase_no','',['class'=>'form-control','id'=>'purchase_no']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Date Of Purchase" class="col-md-4 control-label">Date Of Purchase</label>
			<div class="col-md-8">
			{{ Form::text('date_of_purchase','',['class'=>'form-control datepicker','id'=>'date_of_purchase']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
			{{ Form::textarea('description','',['class'=>'form-control','id'=>'description', 'rows'=>'4']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Internal Notes" class="col-md-4 control-label">Internal Notes</label>
			<div class="col-md-8">
			{{ Form::textarea('internal_notes','',['class'=>'form-control','id'=>'internal_notes', 'rows'=>'4']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Total Cost" class="col-md-4 control-label">Total Cost</label>
			<div class="col-md-8">
			{{ Form::text('total_cost','',['class'=>'form-control','id'=>'total_cost']) }}
			</div>
		</div>
		<div class="form-group">
			<label for="Amount P" class="col-md-4 control-label">Amount Paid</label>
			<div class="col-md-8">
			{{ Form::text('amount_paid','',['class'=>'form-control','id'=>'amount_paid']) }}
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
<script language="javascript">
var current = 0;
 /**
 *addMore
 *@param e - event
 */ 
function addMore(e)
 {	
	e.preventDefault();
	var item = $("#item_form_template").html();
	
	current = parseInt(current) + 1;
	item = item.replace(/product_id_0/g, "product_id_"+current);
	item = item.replace(/item_quantity_0/gi, "item_quantity_"+current);
	item = item.replace(/item_cost_0/gi, "item_cost_"+current);
	item = item.replace(/item_total_0/gi, "item_total_"+current);
	item = item.replace(/index_0/gi, "index_"+current);
	//item = item.replace(/0/g, current);
	item = item.replace(/(<option\b[^>]*value=".*?">.*?<\/option>|0(?![^<]*<\/option>))/gm, function(match, p1) {
        if (p1 && p1.toLowerCase().includes('value=')) {
            return match;
        }
        return current;
    });
	$("#item_more").append(item);
	 return false;
 }	

 
 /**
 *removeItem
 *@param index - index indicator of the div
 */ 
function removeItem(index){
   var result = confirm("Are you sure to remove this item?");
   if(result==true){
    $(".index"+index ).remove();
   }
   //////////update cost/////////////
	update_cost();
}
/**
*setCost
*@param product_id
*/

function setCost(product_id,counter)
{
	var _token = $('input[name="_token"]').val();
	$.ajax({
			
			method: "POST",
            url: "{{ url('purchase/get_product') }}",
            data: { pid:product_id, _token:_token },  
		  success: function(response) {
				  $("#item_cost_"+counter).val(response.buying_price);
				  //$("#item_total_"+counter).val(response.buying_price);
				  //////////update cost/////////////
				  update_cost();		
			  }
			});
}


/*
   setItemTotal
*/
function setItemTotal(value,id)
{
	index = id.replace("item_quantity_","");
	
	cost = $("#item_cost_"+index).val();
	quantity = $("#item_quantity_"+index).val();
	$("#item_total_"+index).val(parseFloat(cost)*parseFloat(quantity));
	
	//////////update cost/////////////
	update_cost();
			 
}
//////////update cost/////////////
function update_cost()
{
   total_cost = 0.0;	
   for(i=0;i<=current;i++)
   {
	   if($("#item_cost_"+i).val()=='' || $("#item_cost_"+i).val()==undefined)
	   {
		   continue;
	   }
	   total_cost = parseFloat(total_cost) + parseFloat($("#item_cost_"+i).val())*parseFloat($("#item_quantity_"+i).val());
   
			  
	  $("#total_cost").val(total_cost);
	  $("#amount_paid").val(total_cost);
  }
}
</script>
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '{{ asset('/assets/datepicker/images/calendar.gif') }}',
	});

		//submit on pressing submit button  
		$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
	}
});
</script>
<script type="text/javascript">
 $(document).ready(function() {
            
$("#supplier_id").change(function(){
    var id = $(this).val();
    var _token = $('input[name="_token"]').val();
        $.ajax({
            method: "POST",
            url: "{{ url('purchase/get_supplier') }}",
            data: { sid:id, _token:_token },
            success:function(response){
    			$("#supplier_name").val(response.supplier_name);
				$("#email").val(response.email);
				$("#address").val(response.address);
				$("#city").val(response.city);
				$("#phone_no").val(response.phone_no);

        }
		
    });
})
}); 
</script>

