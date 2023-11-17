<ul class="right-side-content d-flex align-items-center">
	<li class="nav-item dropdown">
		<button type="button" class="btn dropdown-toggle"
			data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if (File::exists(public_path().'/assets/'.Auth::user()->file_picture))
			  <img class="border-radius-50"
				src="{{ asset('/assets/'.Auth::user()->file_picture) }}"
				alt="">
        @else
			  <img class="border-radius-50"
				src="{{ asset('/assets/uploads/no_image.jpg') }}">
		@endif
        </button>
		<div class="dropdown-menu dropdown-menu-right">
			<!-- User Profile Area -->
			<div class="user-profile-area">
				<div class="user-profile-heading">
					<!-- Thumb -->
					<div class="profile-thumbnail">
                    @if (File::exists(public_path().'/assets/'.Auth::user()->file_picture))
					      <img class="border-radius-50"
						  src="{{ asset('/assets/'.Auth::user()->file_picture) }}"
							alt="">
                    @else
					      <img class="border-radius-50"
						  src="{{ asset('/assets/uploads/no_image.jpg') }}">
					@endif
                    </div>
					<!-- Profile Text -->
					<div class="profile-text">
						<h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
						<!--<span>{{ Auth::user()->first_name }}</span>-->
					</div>
				</div>
				<a href="{{ url('user') }}"
					class="dropdown-item"><i class="ti-user text-default"
					aria-hidden="true"></i> My profile</a> <a
					href="{{ url('logout') }}"
					class="dropdown-item"><i class="ti-unlink text-warning"
					aria-hidden="true"></i> Sign-out</a>
			</div>
		</div>
	</li>
</ul>
