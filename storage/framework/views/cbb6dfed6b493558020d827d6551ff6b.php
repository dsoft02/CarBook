<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(Auth::user()->profile_picture_url); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(ucwords(Auth::user()->name)); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <li class="<?php echo e(isActiveRoute('user.dashboard')); ?>">
                <a href="<?php echo e(route('user.dashboard')); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('user.bookings.index')); ?>">
                <a href="<?php echo e(route('user.bookings.index')); ?>"><i class="fa fa-calendar"></i> <span>My Bookings</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('user.profile')); ?>">
                <a href="<?php echo e(route('user.profile')); ?>"><i class="fa fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('user.support')); ?>">
                <a href="<?php echo e(route('user.contacts')); ?>"><i class="fa fa-life-ring"></i> <span>Support</span></a>
            </li>
            <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\carbook\resources\views/user/partials/sidebar.blade.php ENDPATH**/ ?>