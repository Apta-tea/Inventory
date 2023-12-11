<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<table class="table" align="center" width="100%"> 
@if (!empty($company && $purchase && $supplier))   
    <tr>
        <td width="30%">
    		 @if (!empty($company->file_company_logo) && File::exists(public_path().'/assets/'.$company->file_company_logo)) 
			  <img src="{{ asset('/assets/'.$company->file_company_logo) }}" class="picture_100x100">
             @else
            <img src="{{ asset('/assets/uploads/no_image.jpg') }}" class="picture_100x100">
             @endif
        </td>
        <td align="center">      
          <h3>{{ $company->company_name }}</h3>
          {{ $company->address }}<br>
          {{ $company->city }},{{ $company->state }},{{ $company->zip }},{{ $company->country }}<br>
        </td>
        <td  width="30%">
        </td>
    </tr>
</table>

<br><br><br>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGE_NUM} of {PAGE_COUNT}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->

<div class="panel-heading">
   <h3 class="purchase"><strong>Purchase</strong></h3>
   <b>Purchase NO: {{ $purchase->purchase_no }}</b>
 </div>
<br>
PAY TO 
<hr> 
<table  cellspacing="3" cellpadding="3" class="table" align="left">
      <tr><td>{{ $supplier->company }}</td></tr>  
      <tr><td>{{ $supplier->supplier_name }}</td></tr>
      <tr><td>{{ $supplier->address }}
           <br>
          {{ $supplier->zip }},{{ $supplier->city }},{{ $supplier->state }}</td></tr>
      <tr><td>{{ $supplier->phone_no }}</td></tr>
      <tr><td>{{ $supplier->email }}</td></tr>
</table>        
     
<br>                     
ITEMS  
<hr>                 
<!--Data display of purchase-->
<table class="table" align="center" width="100%">    
    <tr>
        <th>Product</th>
        <th>Item Cost</th>
        <th>Item Quantity</th>
        <th>Item Total</th>
    </tr>
       <tr>
                @php
				$item = App\Models\Item_purchase::where('purchase_id',$purchase->id)->get();
				@endphp
				@foreach ($item as $i) 
                   <tr>
                   <td align="center">
					@php
					$p = App\Models\Product::where('id',$i->product_id)->value('product_name');
					echo $p;
					@endphp
                    </td>
					<td align="center">{{ number_format($i->item_cost) }}</td>
					<td align="center">{{ number_format($i->item_quantity) }}</td>
					<td align="center">{{ number_format($i->item_total) }}</td>
                @endforeach
    </tr>
</table>		
<!--End of Data display of purchase//-->

<br><br>
GENERAL INFO
<hr>
<table  cellspacing="3" cellpadding="3" class="table" align="center">
    <tr><td>Date of purchase</td><td>{{ $purchase->date_of_purchase }}</td></tr>
    <tr><td>Description</td><td>{{ $purchase->description }}</td></tr>
    <tr><td>Total cost</td><td>{{ number_format($purchase->total_cost) }}</td></tr>
    <tr><td>Amount paid</td><td>{{ number_format($purchase->amount_paid) }}</td></tr>		
</table>
@else
<!--No data-->
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->