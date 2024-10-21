<?php
$pageTitle = 'Car List'
?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Car List
        <small>Manage Cars</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo e(route('admin.cars.index')); ?>">Manage Car</a></li>
        <li class="active">Car List</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Car List</h3>
               <!-- tools box -->
              <div class="pull-right box-tools">
                <a href="<?php echo e(route('admin.cars.create')); ?>" class="btn bg-navy" title="" data-original-title="Create New" >
                  <i class="fa fa-plus"></i> Create New</a>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="list-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Brand</th>
                  <th>Model</th>
                  <th>Seat Type</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($indx + 1); ?></td>
                    <td><?php echo e($car->name); ?></td>
                    <td><?php echo e($car->brand->name); ?></td>
                    <td><?php echo e($car->carModel ? $car->carModel->name : 'N/A'); ?></td>
                    <td><?php echo e($car->seatType->name); ?></td>
                    <td><?php echo e($car->formated_price); ?></td>
                    <td><?php echo getStatusLabel($car->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.cars.edit', $car->id)); ?>" class="btn bg-navy" title="" data-original-title="Edit car"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo e(route('admin.cars.destroy', $car->id)); ?>" class="btn btn-danger" data-confirm-delete="true" title="" data-original-title="Delete car model"><i class="fa fa-trash"></i> Delete</a>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/cars/index.blade.php ENDPATH**/ ?>