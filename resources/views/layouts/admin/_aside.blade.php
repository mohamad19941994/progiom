<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('assets/admin/img/favicon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             >
        <span class="brand-text font-weight-light">كواليتي</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://scontent.fada2-2.fna.fbcdn.net/v/t1.0-9/78542811_2474169056141350_8558857754834370560_o.jpg?_nc_cat=109&ccb=2&_nc_sid=09cbfe&_nc_ohc=Sf_8tlXHeJMAX9slQ1_&_nc_ht=scontent.fada2-2.fna&oh=09484aa7caa2bded1841c056e2edc3d7&oe=5FEF236B" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">محمد صلاحية</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">القائمة الرئيسية</li>

                        <!--carts -->
                        <li class="nav-item has-treeview  {{ (request()->route()->uri() == app()->getLocale().'/admin/carts/create' || request()->route()->uri() == app()->getLocale().'/admin/carts' || request()->route()->uri() == app()->getLocale().'/admin/edit' ? 'menu-open' : '')}}">
                            <a href="#" class="nav-link {{ (request()->route()->uri() == app()->getLocale().'/admin/carts/create' || request()->route()->uri() == app()->getLocale().'/admin/carts' || request()->route()->uri() == app()->getLocale().'/admin/edit' ? 'active' : '')}}">
                                <i class="nav-icon fa fa-carts"></i>
                                <p>
                                    الكروت
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('carts.create')}}" class="nav-link {{ (request()->route()->uri() == app()->getLocale().'/admin/carts/create' ? 'active' : '')}}">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>إضافة كرت</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('carts.index')}}" class="nav-link {{ (request()->route()->uri() == app()->getLocale().'/admin/carts' ? 'active' : '')}}">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>عرض</p>
                                    </a>
                                </li>

                            </ul>
                        </li>




                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
