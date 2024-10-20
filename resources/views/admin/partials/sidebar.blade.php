<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->profile_picture_url }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucwords(Auth::user()->name) }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ isActiveRoute('admin.dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i
                        class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="treeview {{ isActiveRoute(['admin.brands.index','admin.models.index','admin.cars.index','admin.features.index','admin.seat-types.index','admin.reviews.index']) }}">
                <a href="#"><i class="fa fa-car"></i> <span>Manage Car</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ isActiveRoute('admin.brands.index') }}"><a href="{{ route('admin.brands.index') }}"><i
                                class="fa fa-circle-o"></i> Brand List</a></li>
                    <li class="{{ isActiveRoute('admin.models.index') }}"><a href="{{ route('admin.models.index') }}"><i
                                class="fa fa-circle-o"></i> Model List</a></li>
                    <li class="{{ isActiveRoute('admin.cars.index') }}"><a href="{{ route('admin.cars.index') }}"><i
                                class="fa fa-circle-o"></i> Car List</a></li>
                    <li class="{{ isActiveRoute('admin.features.index') }}"><a
                            href="{{ route('admin.features.index') }}"><i class="fa fa-circle-o"></i> Feature List</a>
                    </li>
                    <li class="{{ isActiveRoute('admin.seat-types.index') }}"><a
                            href="{{ route('admin.seat-types.index') }}"><i class="fa fa-circle-o"></i> Seat Type</a>
                    </li>
                    <li class="{{ isActiveRoute('admin.reviews.index') }}"><a href="{{ route('admin.reviews.index') }}"><i
                                class="fa fa-circle-o"></i> Review List</a></li>

                </ul>
            </li>
            <li class="treeview {{ isActiveRoute(['admin.bookings.index', 'admin.bookings.upcoming', 'admin.bookings.completed']) }}">
                <a href="#"><i class="fa fa-car"></i> <span>Manage Bookings</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ isActiveRoute('admin.bookings.index') }}">
                        <a href="{{ route('admin.bookings.index') }}">
                            <i class="fa fa-circle-o"></i> All Bookings
                        </a>
                    </li>
                    <li class="{{ isActiveRoute('admin.bookings.upcoming') }}">
                        <a href="{{ route('admin.bookings.upcoming') }}">
                            <i class="fa fa-circle-o"></i> Upcoming Bookings
                        </a>
                    </li>
                    <li class="{{ isActiveRoute('admin.bookings.completed') }}">
                        <a href="{{ route('admin.bookings.completed') }}">
                            <i class="fa fa-circle-o"></i> Completed Bookings
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-users"></i> <span>Manage Users</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i>Users List</a></li>
                    <li><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i>Create New</a></li>
                    </li>
                </ul>
            </li>

            <li class="{{ isActiveRoute('admin.contacts') }}"><a href="{{ route('admin.contacts') }}"><i
                        class="fa fa-envelope"></i> <span>Contact Message</span></a></li>
            <li><a href="{{ route('applogout') }}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
