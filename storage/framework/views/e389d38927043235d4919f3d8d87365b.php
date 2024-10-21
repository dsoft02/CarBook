<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(Auth::user()->profile_picture_url); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(ucwords(Auth::user()->name)); ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo e(isActiveRoute('admin.dashboard')); ?>"><a href="<?php echo e(route('admin.dashboard')); ?>"><i
                        class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="treeview <?php echo e(isActiveRoute(['admin.brands.index','admin.models.index','admin.cars.index','admin.features.index','admin.seat-types.index','admin.reviews.index'])); ?>">
                <a href="#"><i class="fa fa-car"></i> <span>Manage Car</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(isActiveRoute('admin.brands.index')); ?>"><a href="<?php echo e(route('admin.brands.index')); ?>"><i
                                class="fa fa-circle-o"></i> Brand List</a></li>
                    <li class="<?php echo e(isActiveRoute('admin.models.index')); ?>"><a href="<?php echo e(route('admin.models.index')); ?>"><i
                                class="fa fa-circle-o"></i> Model List</a></li>
                    <li class="<?php echo e(isActiveRoute('admin.cars.index')); ?>"><a href="<?php echo e(route('admin.cars.index')); ?>"><i
                                class="fa fa-circle-o"></i> Car List</a></li>
                    <li class="<?php echo e(isActiveRoute('admin.features.index')); ?>"><a
                            href="<?php echo e(route('admin.features.index')); ?>"><i class="fa fa-circle-o"></i> Feature List</a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('admin.seat-types.index')); ?>"><a
                            href="<?php echo e(route('admin.seat-types.index')); ?>"><i class="fa fa-circle-o"></i> Seat Type</a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('admin.reviews.index')); ?>"><a href="<?php echo e(route('admin.reviews.index')); ?>"><i
                                class="fa fa-circle-o"></i> Review List</a></li>

                </ul>
            </li>
            <li class="treeview <?php echo e(isActiveRoute(['admin.bookings.index', 'admin.bookings.upcoming', 'admin.bookings.completed'])); ?>">
                <a href="#"><i class="fa fa-car"></i> <span>Manage Bookings</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(isActiveRoute('admin.bookings.index')); ?>">
                        <a href="<?php echo e(route('admin.bookings.index')); ?>">
                            <i class="fa fa-circle-o"></i> All Bookings
                        </a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('admin.bookings.upcoming')); ?>">
                        <a href="<?php echo e(route('admin.bookings.upcoming')); ?>">
                            <i class="fa fa-circle-o"></i> Upcoming Bookings
                        </a>
                    </li>
                    <li class="<?php echo e(isActiveRoute('admin.bookings.completed')); ?>">
                        <a href="<?php echo e(route('admin.bookings.completed')); ?>">
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
                    <li><a href="<?php echo e(route('admin.users.index')); ?>"><i class="fa fa-circle-o"></i>Users List</a></li>
                    <li><a href="<?php echo e(route('admin.users.create')); ?>"><i class="fa fa-circle-o"></i>Create New</a></li>
                    </li>
                </ul>
            </li>

            <li class="<?php echo e(isActiveRoute('admin.contacts')); ?>"><a href="<?php echo e(route('admin.contacts')); ?>"><i
                        class="fa fa-envelope"></i> <span>Contact Message</span></a></li>
            <li><a href="<?php echo e(route('applogout')); ?>"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>