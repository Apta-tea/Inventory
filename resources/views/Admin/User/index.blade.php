<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Users') }}</h5>
<!--Action-->
@if (isset($user))
<div>
	<div class="float_left padding_10">
		<a href="{{ ('user/create') }}"
			class="btn btn-success">Add</a>
	</div>
	<!-- <div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='{{ ('users/export') }}/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div> -->
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                {{ Form::open(array('url'=>'user/search','class'=>'form-horizontal','role'=>'search')) }}
                {{ Form::text('keyword',null,['class'=>'form-control','placeholder'=>'Search', 'placeholder'=>'email..', 'required']) }} 
                {{ Form::button('<i class="fa fa-search"></i>',["type"=>"submit","class"=>"mr-0"]) }}
                {{ Form::close() }}
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of users-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Email</th>
		<th>Title</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>File Picture</th>
		<th>Phone No</th>
		<th>Dob</th>
		<th>User Type</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	@foreach($user as $c)
    <tr>
		<td>{{ $c->email }}</td>
		<td>{{ $c->title }}</td>
		<td>{{ $c->first_name }}</td>
		<td>{{ $c->last_name }}</td>
		<td>
            @if (!empty($c->file_picture) && File::exists(public_path().'/assets/'.$c->file_picture))
                <img src="{{ asset('/assets/'.$c->file_picture) }}" class='picture_50x50'>
            @else
                <img src="{{ public_path().'/assets/uploads/no_image.jpg' }}" class='picture_50x50'>
            @endif
        </td>
		<td>{{ $c->phone_no }}</td>
		<td>{{ $c->dob }}</td>
		<td>{{ $c->user_type }}</td>
		<td>{{ $c->status }}</td>

		<td>
            <a href="{{ ('user/'.$c->id) }}" class="action-icon"> <i class="fa fa-eye"></i></a> 
            <a href="{{ ('user/'.$c->id.'/edit') }}" class="action-icon"> <i class="fa fa-pencil"></i></a> 
            {{ Form::open(array('url' => 'user/'.$c->id, 'method' => 'delete')) }}
    		{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'onclick' => 'return confirm("Are you sure to delete this item?")', 'class' => 'btn btn-flat']) }}
			{{ Form::close() }}
        </td>
    @endforeach
	</tr>
</table>
<!--End of Data display of users//-->
<!--Pagination-->
{{ $user->links() }}
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


