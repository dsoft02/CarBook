<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bookings List
        <small>Upcoming Bookings</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo e(route('admin.bookings.index')); ?>">Manage Bookings</a></li>
        <li class="active">Upcoming Bookings</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Upcoming Bookings</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="list-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Car</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $upcomingBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($booking->user->name); ?></td>
                            <td><?php echo e($booking->car->name); ?></td>
                            <td><?php echo e($booking->start_date); ?></td>
                            <td><?php echo e($booking->end_date); ?></td>
                            <td>₦<?php echo e(number_format($booking->total_price, 2)); ?></td>
                            <td><?php echo getBookingStatusLabel($booking->status); ?></td>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <a href="<?php echo e(route('admin.bookings.show', $booking->id)); ?>"
                                       class="btn btn-primary btn-sm" title="View Booking">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <?php if($booking->status !== 'completed' && $booking->status !== 'canceled'): ?>
                                    <form action="<?php echo e(route('admin.bookings.cancel', $booking->id)); ?>" method="POST"
                                          onsubmit="return confirm('Are you sure you want to cancel this booking?');"
                                          style="margin-left: 5px;">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Cancel Booking">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('backend/js/pages/car.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/bookings/upcoming.blade.php ENDPATH**/ ?>