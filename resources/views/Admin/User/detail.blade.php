<a href="{{ url()->previous() }}"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1">User Detail</h5>
<table class="table table-striped table-bordered">
	<tr>
		<td>Email</td>
		<td>{{ $user->email }}</td>
	</tr>
	<tr>
		<td>Title</td>
		<td>{{ $user->title }}</td>
	</tr>
	<tr>
		<td>First Name</td>
		<td>{{ $user->first_name }}</td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td>{{ $user->last_name }}</td>
	</tr>
	<tr>
		<td>File Picture</td>
		<td>
                @if (File::exists(public_path().'/assets/'.$user->file_picture))
					  <img src="{{ asset('/assets/'.$user->file_picture) }}" class='picture_100x100'>
                @else
					<img src="{{ public_path().'/assets/uploads/no_image.jpg' }}" class='picture_100x100'>
				@endif
        </td>
	</tr>
	<tr>
		<td>Phone No</td>
		<td>{{ $user->phone_no }}</td>
	</tr>
	<tr>
		<td>Dob</td>
		<td>{{ $user->dob }}</td>
	</tr>
	<tr>
		<td>Company</td>
		<td>{{ $user->company }}</td>
	</tr>
	<tr>
		<td>Address</td>
		<td>{{ $user->address }}</td>
	</tr>
	<tr>
		<td>City</td>
		<td>{{ $user->city }}</td>
	</tr>
	<tr>
		<td>State</td>
		<td>{{ $user->state }}</td>
	</tr>
	<tr>
		<td>Zip</td>
		<td>{{ $user->zip }}</td>
	</tr>
	<tr>
		<td>Country</td>
        @if (!empty($user->country_id))
        $country = App\Models\countrys::find($user->country_id) 
		<td>{{ $country->country }}</td>
        @else
        <td>{{ $user->country_id }}</td>
        @endif
	</tr>
	<tr>
		<td>Created At</td>
		<td>{{ $user->created_at }}</td>
	</tr>
	<tr>
		<td>Updated At</td>
		<td>{{ $user->updated_at }}</td>
	</tr>
	<tr>
		<td>User Type</td>
		<td>{{ $user->user_type }}</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{ $user->status }}</td>
	</tr>
</table>