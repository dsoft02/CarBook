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
        <li>Manage Car</li>
        <li class="active">Car List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
              <div class="box box-primary">
                    <div class="box-header with-border">
                          <h3 class="box-title">Add Car</h3>
                         <!-- tools box -->
                          <div class="pull-right box-tools">
                                <a href="<?php echo e(route('admin.cars.index')); ?>" class="btn bg-navy" title=""

                           data-original-title="Back" data-toggle="modal" data-target="#addModal">
                                      <i class="fa fa-undo"> </i> Back</a>
                          </div>
                          <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <form id="carForm" role="form" action="<?php echo e(route('admin.cars.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                          <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="carName">Name <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="carName" name="name" value="<?php echo e(old('name')); ?>" required>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="carBrand">Brand <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="carBrand" name="brand_id" style="width:100%" required>
                                                  <option value="">Select a Brand</option>
                                                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>>
                                                        <?php echo e($brand->name); ?>

                                                    </option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['car_model_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="carModel">Model <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="carModel" name="car_model_id" style="width:100%" required>
                                                  <option value="">Select a Model</option>
                                                  <?php $__currentLoopData = $carModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($carModel->id); ?>" <?php echo e(old('car_model_id') == $carModel->id ? 'selected' : ''); ?>>
                                                        <?php echo e($carModel->name); ?>

                                                    </option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['car_model_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="year">Year <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="year" name="year" style="width:100%">
                                                <option value="">Select car year</option>
                                                <?php for($year = date('Y'); $year >= 1900; $year--): ?>
                                                    <option value="<?php echo e($year); ?>" <?php echo e(old('year') == $year ? 'selected' : ''); ?>><?php echo e($year); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['seat_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="seatType">Seat Type <span class="text-danger">*</span></label>
                                            <select class="form-control select2" id="seatType" name="seat_type_id" style="width:100%" required>
                                                  <option value="">Select a seat type</option>
                                                  <?php $__currentLoopData = $seatTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seatType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($seatType->id); ?>" <?php echo e(old('seat_type_id') == $seatType->id ? 'selected' : ''); ?>><?php echo e($seatType->name); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['seat_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['fuel_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="fuel_type">Fuel Type <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="fuel_type" name="fuel_type"  value="<?php echo e(old('fuel_type')); ?>">
                                            <?php $__errorArgs = ['fuel_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="color">Colour <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="color" name="color" value="<?php echo e(old('color')); ?>" required>
                                            <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['doors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="doors">Doors <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control number" id="doors" name="doors" value="<?php echo e(old('doors')); ?>" required>
                                            <?php $__errorArgs = ['doors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['transmission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="transmission">Transmission <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="transmission" name="transmission" value="<?php echo e(old('transmission')); ?>" required>
                                            <?php $__errorArgs = ['transmission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['mileage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="mileage">Mileage <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="mileage" name="mileage" value="<?php echo e(old('mileage')); ?>" required>
                                            <?php $__errorArgs = ['mileage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="status">Visibility Status</label>
                                            <select class="form-control" id="status" name="status">
                                              <option value="1" <?php echo e(old('status') == 1 ? 'selected' : ''); ?>>Active</option>
                                              <option value="0" <?php echo e(old('status') == 0 ? 'selected' : ''); ?>>Inactive</option>
                                            </select>
                                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="carBrand">Price <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control number" id="price" name="price" value="<?php echo e(old('price')); ?>" required>
                                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group <?php $__errorArgs = ['is_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="control-label" for="is_featured">Featured Car</label>
                                            <select class="form-control" id="is_featured" name="is_featured">
                                                <option value="1" <?php echo e(old('is_featured') == 1 ? 'selected' : ''); ?>>Yes</option>
                                                <option value="0" <?php echo e(old('is_featured', 0) == 0 ? 'selected' : ''); ?>>No</option>
                                            </select>
                                            <?php $__errorArgs = ['is_featured'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                          <label class="control-label" for="description">Description</label>
                                            <textarea id="description" name="description" rows="10" cols="80"><?php echo e(old('description')); ?></textarea>
                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="help-block"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label">Images</label>
                                            <div class="image-upload-container" id="image-upload-container">
                                                <!-- Add button -->
                                                <div class="image-upload-box" onclick="document.getElementById('images').click()">
                                                    <i class="fa fa-plus-circle fa-2x text-primary"></i>
                                                </div>
                                                <input type="file" name="images[]" id="images" multiple style="display: none;" accept="image/*" onchange="previewImages(event)">
                                            </div>
                                            <!-- Display the error message -->
                                            <?php if($errors->has('images')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('images')); ?></span>
                                            <?php endif; ?>
                                            <?php if($errors->has('images.*')): ?>
                                                <span class="text-danger"><?php echo e($errors->first('images.*')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                 <div class="row">
                                    <label class="col-md-12">Features</label>
                                    <?php $__currentLoopData = $carFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="col-md-3">
                                        <input type="checkbox" name="car_features[]" class="minimal-red" value="<?php echo e($carFeature->id); ?>" <?php echo e(in_array($carFeature->id, old('car_features', [])) ? 'checked' : ''); ?>>
                                        <?php echo e($carFeature->name); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- /.col -->
                                </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                    </form>
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
<!-- CK Editor -->
<script src="<?php echo e(asset('backend/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/pages/car.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/admin/cars/create.blade.php ENDPATH**/ ?>