<?php
$pageTitle = 'Model List'
?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Model List
        <small>Manage car models</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li>Manage Car</li>
        <li class="active">Model List</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Model List</h3>
               <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn bg-navy" title="" data-original-title="Create New" data-toggle="modal" data-target="#addModal">
                  <i class="fa fa-plus"></i> Create New</button>
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
                  <th>Total Car</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $carmodels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $carmodel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($indx + 1); ?></td>
                    <td><?php echo e($carmodel->name); ?></td>
                    <td><?php echo e($carmodel->brand->name); ?></td>
                    <td><?php echo e($carmodel->total_cars); ?></td>
                    <td><?php echo getStatusLabel($carmodel->status); ?></td>
                    <td>
                        <button class="btn bg-navy" title="" data-original-title="Edit car model" onclick="openEditModal('<?php echo e(route('admin.models.update', $carmodel->id)); ?>', '<?php echo e($carmodel->name); ?>','<?php echo e($carmodel->brand_id); ?>','<?php echo e($carmodel->status); ?>')"><i class="fa fa-edit"></i> Edit</button>
                        <a href="<?php echo e(route('admin.models.destroy', $carmodel->id)); ?>" class="btn btn-danger" data-confirm-delete="true" title="" data-original-title="Delete car model"><i class="fa fa-trash"></i> Delete</a>
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
    <!-- Add carmodel Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title fw-bold">Create Car Model</h3>
          </div>
          <form action="<?php echo e(route('admin.models.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
              <div class="modal-body">
                <div class="form-group">
                    <label for="brandSelect">Car Brand</label>
                    <select class="form-control" id="brandSelect" name="brand_id" style="width:100%" required>
                          <option value="">Select a Brand</option>
                          <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="carmodelName">Model Name</label>
                    <input type="text" class="form-control" id="carmodelName" name="name" required>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title fw-bold">Edit car model</h3>
          </div>
          <form id="editForm" method="POST" action="">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
              <div class="modal-body">
                <div class="form-group">
                    <label for="editBrand">Car Brand</label>
                    <select class="form-control" id="editBrand" name="brand_id" style="width:100%" required>
                          <option value="">Select a Brand</option>
                          <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="editName">Model Name</label>
                    <input type="text" class="form-control" id="editName" name="name" required>
                </div>
                 <div class="form-group">
                    <label for="estatus">Visibility Status</label>
                    <select class="form-control" id="estatus" name="status" required>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('backend/js/pages/carmodel.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/carmodels/index.blade.php ENDPATH**/ ?>