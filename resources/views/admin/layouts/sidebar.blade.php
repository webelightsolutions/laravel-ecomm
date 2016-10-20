<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="@yield('productCategoryActiveStatus')"><a href="{{ url('/admin/product-category') }}">Product Categories</a></li>
            <li class="@yield('sizeActiveStatus')"><a href="{{ url('/admin/size') }}">Sizes</a></li>
            <li class="@yield('colorActiveStatus')"><a href="{{ url('/admin/color') }}">Colors</a></li>
            <li class="@yield('productActiveStatus')"><a href="{{ url('/admin/product') }}">Products</a></li>
            <li class="@yield('sliderActiveStatus')"><a href="{{ url('/admin/slider') }}">Front Slider</a></li>
            <li class="treeview @yield('couponActiveStatus')">
                <a href="#">
                    <span>Coupon Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open">
                    <li><a href="{{ url('/admin/coupon') }}">Coupons</a></li>
                    <li><a href="{{ url('/admin/coupon/assignCoupon') }}">Assign Coupons</a></li>
                </ul>
            </li>
            <li class="@yield('userActiveStatus')"><a href="{{ url('/admin/index') }}">User Management</a></li>
            <li class="@yield('customerActiveStatus')"><a href="{{ url('/admin/customer') }}">Customers</a></li>
          
            <li class="treeview @yield('orderActiveStatus')">
                <a href="#">
                    <span>Orders</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open">
                    <li><a href="{{ url('/admin/orders?status=success_orders') }}">Success Orders</a></li>
                    <li><a href="{{ url('/admin/orders?status=failed_orders') }}">Failed Orders</a></li>
                </ul>
            </li>
            <li class="@yield('invoiceActiveStatus')"><a href="{{ url('/admin/invoice') }}">Invoices</a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
