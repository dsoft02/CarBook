<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?php echo e(asset('frontend/images/bg_3.jpg')); ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Address:</span> Department of Computer Science, Faculty of Natural Sciences, Lagos State University</p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Phone:</span> <a href="tel://+2349169442847">+234 916 9442 847</a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:ebendev09@gmail.com">ebendev09@gmail.com</a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
            <form class="bg-light p-5 contact-form" action="<?php echo e(route('contact.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="<?php echo e(old('name')); ?>" required>
                <?php $message = ['Hello world']; ?>
                <?php if (isset($component)) { $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-error','data' => ['messages' => $errors->get('name'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('name')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $attributes = $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $component = $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo e(old('email')); ?>" required>
                <?php if (isset($component)) { $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $attributes = $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $component = $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo e(old('subject')); ?>" required>
                <?php if (isset($component)) { $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-error','data' => ['messages' => $errors->get('subject'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('subject')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $attributes = $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $component = $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" name="message" id="message" placeholder="Message"><?php echo e(old('message')); ?></textarea>
                <?php if (isset($component)) { $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert-error','data' => ['messages' => $errors->get('message'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('message')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $attributes = $__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__attributesOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3)): ?>
<?php $component = $__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3; ?>
<?php unset($__componentOriginal9f8e81b29df95f108aa662b57c2bb9b3); ?>
<?php endif; ?>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sitemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carbook\resources\views/contact.blade.php ENDPATH**/ ?>