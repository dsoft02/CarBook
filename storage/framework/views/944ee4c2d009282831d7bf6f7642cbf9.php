<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
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
            <a href="<?php echo e(route('admin.bookings.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Featured Cars -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo e($featuredCars); ?></h3>
                <p>Featured Cars</p>
            </div>
            <div class="icon">
                <i class="ion ion-star"></i>
            </div>
            <a href="<?php echo e(route('admin.cars.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Total Cars -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo e($totalCars); ?></h3>
                <p>Total Cars</p>
            </div>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <a href="<?php echo e(route('admin.cars.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- Active Users -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo e($activeUsers); ?></h3>
                <p>Active Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo e(route('admin.users.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
    <div class="col-md-6">
        <!-- RECENT CAR LIST -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Cars</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                   <?php $__currentLoopData = $recentCars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="item">
        <div class="product-img">
            <img src="<?php echo e($car->image_url); ?>" alt="<?php echo e($car->name); ?>" style="width: 50px; height: 50px;">
        </div>
        <div class="product-info">
            <a href="<?php echo e(route('admin.cars.edit', $car->id)); ?>" class="product-title"><?php echo e($car->name); ?></a>
            <span class="product-description">
                <?php echo e($car->brand->name ?? 'No brand available.'); ?> |
                <?php echo e($car->model ?? 'No model available.'); ?> |
                <?php echo e($car->year ?? 'No year available.'); ?> |
                <?php echo e($car->color ?? 'No color available.'); ?>

            </span>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="<?php echo e(route('admin.cars.index')); ?>" class="uppercase">View All Cars</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- TABLE: LATEST BOOKINGS -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Bookings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Car</th>
                            <th>User</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $latestBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(route('admin.bookings.show', $booking->id)); ?>"><?php echo e($booking->id); ?></a></td>
                                <td><?php echo e($booking->car->name); ?></td>
                                <td><?php echo e($booking->user->name); ?></td>
                                <td>
                                <?php echo getBookingStatusLabel($booking->status); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="<?php echo e(route('admin.bookings.index')); ?>" class="uppercase">View All Bookings</a>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>