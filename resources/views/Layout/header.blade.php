<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->
<title>Admin 
            @if (request()->route()->uri() == 'admin')
                {{ 'Home' }}
            @else
                {{ request()->route()->uri() }}
            @endif
</title>

<!-- Favicon -->
<link rel="icon"
	href="{{ asset('assets/riktheme/img/core-img/favicon.png') }}">

<!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
<link rel="stylesheet"
    href="{{ asset('assets/riktheme/style.css') }}" >
<link rel="stylesheet"    
    href="{{ asset('assets/css/custom.css') }}" >
<link rel="stylesheet"
    href="{{ asset('assets/datepicker/jquery-ui.css') }}" >
<script src="{{ asset('/assets/datepicker/jquery-1.10.2.js') }}" ></script>
<script src="{{ asset('/assets/datepicker/jquery-ui.js') }}" ></script>

</head>

<body>
	<!-- Preloader -->
	<div id="preloader"></div>

	<!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
	<div class="ecaps-page-wrapper">
		<!-- Sidemenu Area -->
		<div class="ecaps-sidemenu-area">
			<!-- Desktop Logo -->
			<div class="ecaps-logo">
				@php
				$company = \App\Models\Company::where('status','active')->first(); 
				@endphp
				@if (!empty($company->file_company_logo) && File::exists(public_path().'/assets/'.$company->file_company_logo))
					<a href="{{ url()->current() }}"><img
					class="desktop-logo"
					src="{{ asset('/assets/'.$company->file_company_logo) }}"
					alt="Desktop Logo"> <img class="small-logo"
					src="{{ asset('/assets/'.$company->file_company_logo) }}"
					alt="Mobile Logo"></a>
                @else
					<a href="{{ url()->current() }}"><img
					class="desktop-logo"
					src="{{ asset('/assets/uploads/logo.png') }}"
					alt="Desktop Logo"> <img class="small-logo"
					src="{{ asset('/assets/uploads/logo.png') }}"
					alt="Mobile Logo"></a>
                @endif
            </div>
			<!-- Side Nav -->
			<div class="ecaps-sidenav" id="ecapsSideNav">
				<!-- Side Menu Area -->
				<div class="side-menu-area">
				@include('Layout.left_menu')
                </div>
			</div>
		</div>

		<!-- Page Content -->
		<div class="ecaps-page-content">
			<!-- Top Header Area -->
			<header
				class="top-header-area d-flex align-items-center justify-content-between">
				<div class="left-side-content-area d-flex align-items-center">
					<!-- Mobile Logo -->
					<div class="mobile-logo mr-3 mr-sm-4">
				@if (!empty($company->file_company_logo) && File::exists(public_path().'/assets/'.$company->file_company_logo))
					<a href="{{ url()->current() }}"><img
					class="desktop-logo"
					src="{{ asset('/assets/'.$company->file_company_logo) }}"
					alt="Desktop Logo"> <img class="small-logo"
					src="{{ asset('/assets/'.$company->file_company_logo) }}"
					alt="Mobile Logo"></a>
                @else
					<a href="{{ url()->current() }}"><img
					class="desktop-logo"
					src="{{ asset('/assets/uploads/logo.png') }}"
					alt="Desktop Logo"> <img class="small-logo"
					src="{{ asset('/assets/uploads/logo.png') }}"
					alt="Mobile Logo"></a>
                @endif
                    </div>

					<!-- Triggers -->
					<div class="ecaps-triggers mr-1 mr-sm-3">
						<div class="menu-collasped" id="menuCollasped">
							<i class="zmdi zmdi-menu"></i>
						</div>
						<div class="mobile-menu-open" id="mobileMenuOpen">
							<i class="zmdi zmdi-menu"></i>
						</div>
					</div>
				</div>

				<div
					class="right-side-navbar d-flex align-items-center justify-content-end">
					<!-- Mobile Trigger -->
					<div class="right-side-trigger" id="rightSideTrigger">
						<i class="ti-align-left"></i>
					</div>

					<!-- Top Bar Nav -->
					@include('Layout.topbarnav')
                </div>
			</header>

			<!-- Main Content Area -->
			<div class="main-content">
			<div class="container-fluid">