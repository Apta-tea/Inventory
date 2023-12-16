<link rel="stylesheet"
	href="{{ asset('assets/css/custom.css') }}">    
<table class="table" align="center" width="100%"> 
@if (!empty($company && $material && $manufacturer))   
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
*********dompdf header footer page no******************
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
   <h3 class="material"><strong>Transmittal</strong></h3>
   <b>Declaration No: {{ $material->issued_no }}</b>
 </div>
<br>
Receive By 
<hr> 
<table  cellspacing="3" cellpadding="3" class="table" align="left">
      <tr><td>{{ $manufacturer->company_name }}</td></tr>  
      <tr><td>{{ $manufacturer->address }}
           <br>
          {{ $manufacturer->zip }},{{ $manufacturer->city }},{{ $manufacturer->state }}</td></tr>
</table>        
     
<br>                     
ITEMS  
<hr>                 
<!--Data display of material-->
<table class="table" align="center" width="100%">    
    <tr>
        <th>Product</th>
        <th>Item Price</th>
        <th>Item Quantity</th>
        <th>Item Total</th>
    </tr>
       <tr>
                @php
				$item = App\Models\Item_material::where('issued_id',$material->id)->get();
				@endphp
				@foreach ($item as $i) 
                   <tr>
                   <td align="center">
					@php
					$p = App\Models\Product::where('id',$i->product_id)->value('product_name');
					echo $p;
					@endphp
                    </td>
					<td align="center">{{ number_format($i->item_price) }}</td>
					<td align="center">{{ number_format($i->item_quantity) }}</td>
					<td align="center">{{ number_format($i->item_total) }}</td>
                @endforeach
    </tr>
</table>		
<!--End of Data display of material//-->

<br><br>
GENERAL INFO
<hr>
<table  cellspacing="3" cellpadding="3" class="table" align="center">
    <tr><td>Operator</td><td>
    @php
    $p = App\Models\User::where('id',$material->user_id)->first();
    echo $p->email;
    @endphp
    </td></tr>
    <tr><td>Issued Date</td><td>{{ $material->issued_date }}</td></tr>
    <tr><td>Description</td><td>{{ $material->description }}</td></tr>
    <tr><td>Amount</td><td>{{ number_format($material->amount) }}</td></tr>		
</table>
@else
<!--No data-->
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->