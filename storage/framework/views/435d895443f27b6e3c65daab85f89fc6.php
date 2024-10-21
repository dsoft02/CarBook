<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contact Messages
        <small>View Message</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?php echo e(route('admin.contacts')); ?>">Contact Messages</a></li>
        <li class="active">View Message</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View Message</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="<?php echo e(route('admin.contacts')); ?>" class="btn bg-navy" title="" data-original-title="Back">
                            <i class="fa fa-undo"> </i> Back</a>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>Subject: <?php echo e($contact->subject); ?></h3>
                        <h5>From: <?php echo e(ucwords($contact->name)); ?> (<?php echo e($contact->email); ?>)
                            <span class="mailbox-read-time pull-right"><?php echo e($contact->created_at->format('d M. Y h:i A')); ?></span>
                        </h5>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-read-message">
                        <?php echo $contact->message; ?>

                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <form action="<?php echo e(route('user.contacts.destroy', $contact->id)); ?>" method="POST"
                          style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this message?');">
                            <i class="fa fa-trash-o"></i> Delete
                        </button>
                    </form>
                </div>
                <!-- /.box-footer -->
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/contacts/show.blade.php ENDPATH**/ ?>