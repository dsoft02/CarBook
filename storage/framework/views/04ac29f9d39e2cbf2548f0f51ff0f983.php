<?php
$pageTitle = 'Manage Users'
?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Manage Users
        <small>All Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo e(route('admin.users.index')); ?>">Manage Users</a></li>
        <li class="active">All Users</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Users List</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn bg-navy" title=""
                           data-original-title="Create New">
                            <i class="fa fa-plus"></i> Create New</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="list-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Registered Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e(ucfirst($user->role)); ?></td>
                            <td><?php echo getStatusLabel($user->status); ?></td>
                            <td><?php echo e($user->created_at->format('Y-m-d')); ?></td>
                            <td>
                                <!-- Edit User Button -->
                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-primary btn-sm"
                                   title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- Delete User Form -->
                                <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Deactivate/Reactivate User Form -->
                                <?php if($user->status): ?>
                                <form action="<?php echo e(route('admin.users.deactivate', $user->id)); ?>" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to deactivate this user?');">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning btn-sm" title="Deactivate">
                                        <i class="fa fa-ban"></i>
                                    </button>
                                </form>
                                <?php else: ?>
                                <form action="<?php echo e(route('admin.users.reactivate', $user->id)); ?>" method="POST"
                                      style="display: inline-block;"
                                      onsubmit="return confirm('Are you sure you want to reactivate this user?');">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-success btn-sm" title="Reactivate">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
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
<script>
    $('#list-table').DataTable();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/users/index.blade.php ENDPATH**/ ?>