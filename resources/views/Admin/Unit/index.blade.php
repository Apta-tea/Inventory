<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Units') }}</h5>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="{{ ('unit/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
            {{ Form::open(array('url'=>'unit/search','class'=>'form-horizontal','role'=>'search')) }}
            {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'required']) }} 
			{{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
            {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of country-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Unit</th>
		<th>Actions</th>
	</tr>
	@foreach($unit as $u)
    <tr>
		<td width="680">{{ $u->unit }}</td>
		<td><a
			href="{{ ('unit/'.$u->id) }}"
			class="action-icon"> <i class="fa fa-eye"></i></a> <a
			href="{{ ('unit/'.$u->id.'/edit') }}"
			class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'unit/'.$u->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
		</td>
	</tr>
    @endforeach
</table>
<!--End of Data display of country//-->
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!--No data-->
@if (count($unit) == 0) 
<div align="center">
	<h3>Data is not exists</h3>
</div>
@endif
<!--End of No data//-->

<!--Pagination-->
{{ $unit->links() }}
<!--End of Pagination//-->