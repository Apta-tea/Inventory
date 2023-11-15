<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                @if (File::exists(public_path().'/assets/'.Auth::user()->file_picture))
					  <img
					src="{{ asset('/assets/'.Auth::user()->file_picture) }}"
					alt="">
                @else
					  <img class="border-radius-50"
					src="{{ asset('/assets/uploads/no_image.jpg') }}">
				@endif
            </div>
			<div class="user-content">
				<h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
				<!--<span>Pro User</span>-->
			</div>
		</li>
        <li @if (str_contains(Request::url(),'admin'))
					class="active" @endif >
					<a href="{{ url('admin') }}"><i class="icon_lifesaver"></i> <span>Dashboard</span></a></li>
        @php
        $menu_open = false;
        if ( str_contains(Request::url(),'profile') || str_contains(Request::url(),'country') || str_contains(Request::url(),'company') || str_contains(Request::url(),'user')) 
            {$menu_open = true;}			
        @endphp
        <li
			class="treeview {{ ($menu_open==true)?'menu-open':'' }}
			"><a
			href="javascript:void(0)"><i class="icon_key_alt"></i> <span>Settings</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if ($menu_open==true)
				style="display: block;" @endif >
				<li @if (str_contains(Request::url(),'profile'))
					class="active" @endif ><a
					href="{{ url('profile') }}"><i
						class="icon_table"></i>Profile</a></li>
				<li @if(str_contains(Request::url(),'country'))
					class="active" @endif><a
					href="{{ url('country') }}"><i
						class="icon_table"></i>Country</a></li>
				<li @if(str_contains(Request::url(),'unit'))
					class="active" @endif><a
					href="{{ url('country') }}"><i
						class="icon_table"></i>Unit</a></li>
				<li @if( str_contains(Request::url(),'company'))
					class="active" @endif><a
					href="{{ url('company') }}"><i
						class="icon_table"></i>Company</a></li>
				<li @if(str_contains(Request::url(),'user'))
					class="active" @endif><a
					href="{{ url('user') }}"><i
						class="icon_table"></i>Users</a></li>
			</ul></li> 
        
        @php
        $menu_open = false;
        if (str_contains(Request::url(),'category') || str_contains(Request::url(),'sub_category') || str_contains(Request::url(),'customers') || str_contains(Request::url(),'supplier') || str_contains(Request::url(),'product')) 
            {$menu_open = true;}
		@endphp
        <li
		class="treeview {{ ($menu_open==true)?'menu-open':'' }}"><a
			href="javascript:void(0)"><i class="icon_genius"></i> <span>Product
					Settings</span> <i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(str_contains(Request::url(),'category'))
					class="active" @endif><a
					href="{{ url('category') }}"><i
						class="icon_table"></i>Category</a></li>
				<li @if(str_contains(Request::url(),'sub_category'))
					class="active" @endif><a
					href="{{ url('sub_category') }}"><i
						class="icon_table"></i>Sub Category</a></li>
				<li @if(str_contains(Request::url(),'customers'))
					class="active" @endif><a
					href="{{ url('customers') }}"><i
						class="icon_table"></i>Customers</a></li>
				<li @if(str_contains(Request::url(),'supplier'))
					class="active" @endif><a
					href="{{ url('supplier') }}"><i
						class="icon_table"></i>Supplier</a></li>
				<li @if(str_contains(Request::url(),'product'))
					class="active" @endif><a
					href="{{ url('product') }}"><i
						class="icon_table"></i>Product</a></li>
			</ul></li> 
        
        @php
        $menu_open = false;
        if (str_contains(Request::url(),'purchase') || str_contains(Request::url(),'item_purchase')) 
            {$menu_open = true;}
		@endphp
        <li
		class="treeview {{ ($menu_open==true)?'menu-open':'' }}"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Purchase</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(str_contains(Request::url(),'purchase'))
					class="active" @endif><a
					href="{{ url('purchase') }}"><i
						class="icon_table"></i>Purchase</a></li>
				<li @if(str_contains(Request::url(),'item_purchase'))
					class="active" @endif><a
					href="{{ url('item_purchase') }}"><i
						class="icon_table"></i>Item Purchase</a></li>
			</ul></li> 
        @php
        $menu_open = false;
        if (str_contains(Request::url(),'invoice') || str_contains(Request::url(),'item_invoice')) 
            {$menu_open = true;}
		@endphp
        <li
		class="treeview {{ ($menu_open==true)?'menu-open':'' }}"><a
			href="javascript:void(0)"><i class="icon_cart_alt"></i> <span>Sell</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(str_contains(Request::url(),'invoice'))
					class="active" @endif><a
					href="{{ url('invoice') }}"><i
						class="icon_table"></i>Invoice</a></li>
				<li @if(str_contains(Request::url(),'item_invoice'))
					class="active" @endif><a
					href="{{ url('item_invoice') }}"><i
						class="icon_table"></i>Item Invoice</a></li>
			</ul></li>
        @php
        $menu_open = false;
        if (str_contains(Request::url(),'report_product') ||
			str_contains(Request::url(),'report_purchase') ||
		    str_contains(Request::url(),'report_invoice'))
            {$menu_open = true;}
		@endphp
        <li
		class="treeview {{ ($menu_open==true)?'menu-open':'' }}"><a
			href="javascript:void(0)"><i class="icon_easel"></i> <span>Report</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;" @endif>

				<li @if(str_contains(Request::url(),'report_product'))
					class="active" @endif><a
					href="{{ url('report_product') }}"><i
						class="icon_table"></i>Products</a></li>
				<li @if(str_contains(Request::url(),'report_purchase'))
					class="active" @endif><a
					href="{{ url('report_purchase') }}"><i
						class="icon_table"></i>Purchase</a></li>
				<li @if(str_contains(Request::url(),'report_invoice'))
					class="active" @endif><a
					href="{{ url('report_invoice') }}"><i
						class="icon_table"></i>Sell</a></li>
			</ul></li>
            
	</ul>
</nav>
