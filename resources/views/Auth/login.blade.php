<html lang="en">


<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->
<title>Admin Login</title>

<!-- Favicon -->
<link rel="icon"
	href="{{ asset('assets/riktheme/img/core-img/favicon.png') }}" >


<!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
<link rel="stylesheet"
	href="{{ asset('assets/riktheme/style.css') }}" >

</head>

<body class="dark-color-overlay bg-img" style="background-image: url({{ url('/assets/riktheme/img/bg-img/bg.png') }});">

	<!-- Preloader -->
	<div id="preloader"></div>

	<!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
	<div class="main-content- h-100vh">
		<div class="container h-100">
			<div class="row h-100 align-items-center justify-content-center">
				<div class="col-sm-10 col-lg-8">
					<!-- Middle Box -->
					<div class="middle-box">
						<div class="card mb-0">
							<div class="card-body p-4">
								<div class="row align-items-center">
									<div class="col-md-6">
										<div class="xs-d-none">
											<img
												src="{{ asset('/assets/riktheme/img/bg-img/6.png') }}"
												alt="">
										</div>
									</div>

									<div class="col-md-6">
										<!-- Logo -->
										<div class="card-body-login mb-30">
                                            		<img src="{{ asset('/assets/uploads/logo.png') }}" alt="">
										</div>
										{{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                                <h4 class="font-22 mb-30">Sign In</h4>

                                         
										 <form method="POST" action="{{ route('login') }}">
                        @csrf
                                            <div class="form-group">
											<label class="float-left" for="emailaddress"></label>
											<input class="form-control" type="email" name="email"
												id="email"
												value=""
												required="" placeholder="Enter your email">
										</div>

										<div class="form-group">
											<!-- <a
												href="http://localhost/inventory/index.php/admin/login/forget_password"
												class="text-dark float-right"><span
												class="font-12 text-primary">Forgot your password?</span></a> -->
											<label class="float-left" for="password"></label> <input
												class="form-control" type="password" name="password"
												id="password"
												value=""
												required="" placeholder="Enter your password">
										</div>

										<div class="form-group mb-3">
											<div class="custom-control custom-checkbox pl-0">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input"
														id="customCheck1"> <label class="custom-control-label"
														for="customCheck1"><span class="font-16">Remember me</span></label>
												</div>
											</div>
										</div>

										<div class="form-group mb-0 text-center">
											<button class="btn btn-primary btn-block" type="submit">Log
												In</button>
										</div>

                                        </form>
                                        <!-- <a
											href="http://localhost/inventory/index.php/admin/login/register"
											class="text-dark float-right"><span
											class="font-12 text-primary">Create a new account </span></a> -->
									</div>
									<!-- end card-body -->
								</div>
								<!-- end card -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

	<!-- Must needed plugins to the run this Template -->
	<script src="{{ asset('/assets/riktheme/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/riktheme/js/popper.min.js') }}"></script>
	<script
		src="{{ asset('/assets/riktheme/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/riktheme/js/bundle.js') }}"></script>

	<!-- Active JS -->
	<script
		src="{{ asset('/assets/riktheme/js/default-assets/active.js') }}"></script>

</body>


</html>