<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">{{ str_replace('_',' ','Users') }}</h5>
<!--Action-->
@if (isset($user))
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
            @if (File::exists(public_path().'/assets/'.$c->file_picture))
                <img src="{{ asset('/assets/'.$c->file_picture) }}" class='picture_50x50'>
            @else
                <img src="{{ public_path().'/assets/uploads/no_image.jpg' }}" class='picture_50x50'>
            @endif
        </td>
		<td>{{ $c->phone_no }}</td>
		<td>{{ $c->dob }}</td>
		<td>{{ $c->user_type }}</td>
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


