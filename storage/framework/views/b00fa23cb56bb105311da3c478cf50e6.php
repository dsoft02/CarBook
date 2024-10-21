<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        User Dashboard
        <small>Your Overview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- Total Bookings -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($totalBookings); ?></h3>
                    <p>Total Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Completed Bookings -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo e($completedBookings); ?></h3>
                    <p>Completed Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-checkmark"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Upcoming Bookings -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo e($upcomingBookings); ?></h3>
                    <p>Upcoming Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-calendar"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- Canceled Bookings -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo e($canceledBookings); ?></h3>
                    <p>Canceled Bookings</p>
                </div>
                <div class="icon">
                    <i class="ion ion-close"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- RECENT BOOKINGS -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Recent Bookings</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <?php $__currentLoopData = $recentBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item">
                        <div class="product-img">
                            <img src="<?php echo e($booking->car->image_url); ?>" alt="Product Image">
                          </div>
                            <div class="product-info">
                                <a href="#" class="product-title"><?php echo e($booking->car->name); ?>

<span class="pull-right"><?php echo getBookingStatusLabel($booking->status); ?></span>
                                </a>
                                <span class="product-description">
                                     <div style="display:flex;align-items:center;flex-wrap: nowrap;">
                                <div style="margin-right: 10px;">
                                    <strong>Brand:</strong> <?php echo e($booking->car->brand->name); ?>

                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Model:</strong> <?php echo e($booking->car->carModel->name); ?>

                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Year:</strong> <?php echo e($booking->car->year); ?>

                                </div>
                                <div style="margin-right: 10px;">
                                    <strong>Color:</strong> <?php echo e($booking->car->color); ?>

                                </div>
                            </div>
                                </span>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="#" class="uppercase">View All Bookings</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row (main row) -->
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/user/dashboard.blade.php ENDPATH**/ ?>