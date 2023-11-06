<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                @if (File::exists(public_path().'/'.Auth::user()->file_picture))
					  <img
					src="{{ public_path().'/'.Auth::user()->file_picture }}"
					alt="">
                @else
					  <img class="border-radius-50"
					src="{{ public_path().'/uploads/no_image.jpg' }}">
				@endif
            </div>
			<div class="user-content">
				<h6>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
				<!--<span>Pro User</span>-->
			</div>
		</li>
        <li @if(url()->current()=="admin")
					class="active" >
					@endif
					<a href="{{ url('admin') }}"><i class="icon_lifesaver"></i> <span>Dashboard</span></a></li>
			
        @php
        $menu_open = false;
		@endphp
        @if (url()->current() == "profile" || url()->current() == "country" || url()->current() == "company" || url()->current() == "users") 
            $menu_open = true;
        @endif
        <li
			class="treeview @if($menu_open==true)menu-open
			@endif"><a
			href="javascript:void(0)"><i class="icon_key_alt"></i> <span>Settings</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;" @endif>
				<li @if(url()->current()=="profile")
					class="active" @endif><a
					href="{{ url('admin/profile/index') }}"><i
						class="icon_table"></i>Profile</a></li>
				<li @if(url()->current()=="country")
					class="active" @endif><a
					href="{{ url('admin/country/index') }}"><i
						class="icon_table"></i>Country</a></li>
				<li @if( url()->current()=="company")
					class="active" @endif><a
					href="{{ url('admin/company/index') }}"><i
						class="icon_table"></i>Company</a></li>
				<li @if(url()->current()=="users")
					class="active" @endif><a
					href="{{ url('admin/users/index') }}"><i
						class="icon_table"></i>Users</a></li>
			</ul></li> 
        
        @php
        $menu_open = false;
		@endphp
        @if(url()->current() == "category" || url()->current() == "sub_category" || url()->current() == "customers" || url()->current() == "supplier" || url()->current() == "customers" || url()->current() == "product") 
            $menu_open = true;
        @endif
        <li
			class="treeview @if($menu_open==true)menu-open @endif"><a
			href="javascript:void(0)"><i class="icon_genius"></i> <span>Product
					Settings</span> <i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(url()->current()=="category")
					class="active" @endif><a
					href="{{ url('admin/category/index') }}"><i
						class="icon_table"></i>Category</a></li>
				<li @if(url()->current()=="sub_category")
					class="active" @endif><a
					href="{{ url('admin/sub_category/index') }}"><i
						class="icon_table"></i>Sub Category</a></li>
				<li @if(url()->current()=="customers")
					class="active" @endif><a
					href="{{ url('admin/customers/index') }}"><i
						class="icon_table"></i>Customers</a></li>
				<li @if(url()->current()=="supplier")
					class="active" @endif><a
					href="{{ url('admin/supplier/index') }}"><i
						class="icon_table"></i>Supplier</a></li>
				<li @if(url()->current()=="product")
					class="active" @endif><a
					href="{{ url('admin/product/index') }}"><i
						class="icon_table"></i>Product</a></li>
			</ul></li> 
        
        @php
        $menu_open = false;
		@endphp
        @if (url()->current() == "purchase" || url()->current() == "item_purchase") 
            $menu_open = true;
        @endif
        <li
			class="treeview @if($menu_open==true)menu-open @endif"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Purchase</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(url()->current()=="purchase")
					class="active" @endif><a
					href="{{ url('admin/purchase/index') }}"><i
						class="icon_table"></i>Purchase</a></li>
				<li @if(url()->current()=="item_purchase")
					class="active" @endif><a
					href="{{ url('admin/item_purchase/index') }}"><i
						class="icon_table"></i>Item Purchase</a></li>
			</ul></li> 
        @php
        $menu_open = false;
		@endphp
        @if (url()->current() == "invoice" || url()->current() == "item_invoice") 
            $menu_open = true;
        @endif
        <li
			class="treeview @if($menu_open==true)menu-open @endif"><a
			href="javascript:void(0)"><i class="icon_cart_alt"></i> <span>Sell</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;"@endif>
				<li @if(url()->current()=="invoice")
					class="active" @endif><a
					href="{{ url('admin/invoice/index') }}"><i
						class="icon_table"></i>Invoice</a></li>
				<li @if(url()->current()=="item_invoice")
					class="active" @endif><a
					href="{{ url('admin/item_invoice/index') }}"><i
						class="icon_table"></i>Item Invoice</a></li>
			</ul></li>
        @php
        $menu_open = false;
		@endphp
        @if (url()->current() == "report_product" ||
		    url()->current() == "report_purchase" ||
		    url()->current() == "report_invoice")
            $menu_open = true;
        @endif
        <li
			class="treeview @if($menu_open==true)menu-open @endif"><a
			href="javascript:void(0)"><i class="icon_easel"></i> <span>Report</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" @if($menu_open==true)
				style="display: block;" @endif>

				<li @if(url()->current()=="report_product")
					class="active" @endif><a
					href="{{ url('admin/report_product/index') }}"><i
						class="icon_table"></i>Products</a></li>
				<li @if(url()->current()=="report_purchase")
					class="active" @endif><a
					href="{{ url('admin/report_purchase/index') }}"><i
						class="icon_table"></i>Purchase</a></li>
				<li @if(url()->current()=="report_invoice")
					class="active" @endif><a
					href="{{ url('admin/report_invoice/index') }}"><i
						class="icon_table"></i>Sell</a></li>
			</ul></li>
            
	</ul>
</nav>
