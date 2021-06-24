<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
        <!-- <img src="{{asset('public/images/app_image.jpg')}}" alt="Clean" class="brand-image img-circle elevation-3" -->
             <!-- style="opacity: .8;"> -->
        <span class="brand-text font-weight-light text-center" style="padding-left: 48px;">{{env('APP_NAME', 'Clean')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('public/backend/images/user-icon.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">

                <a href="{{url('admin/dashboard')}}" class="d-block">{{auth()->user()->name ?? ""}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                 <li class="nav-item">
                    @if(Auth::user()->user_type ==1)
                    <a href="{{url('admin/users')}}" class="nav-link {{(request()->is('admin/users') || request()->is('admin/users/*')) ?'active':''}}">
                       <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                    @endif
                </li>
                
                
                <li class="nav-item">
                    <a href="{{route('Admin.Logout')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu 
    </div>
    <!-- /.sidebar -->
</aside>

