<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Admin Panel</h1>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-primary"><?php echo e(Session('message')); ?></div>
    <?php endif; ?>
    <h3>Edit About Image</h3>
    <img src="<?php echo e(asset('storage/img/profileImage.jpg')); ?>" height="350px">
    <form class="form-group" action="<?php echo e(route('profile.image')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input class="mt-3 form-control-file" name="photo" type="file">
        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="mt-3 alert alert-danger" style="width: 25%"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <p class="mt-1">* Image dimensions are 325 pixels by 358 pixels *</p>
        <input class="btn btn-primary" type="submit" value="Upload">
    </form>

    <h3>Upload New Resume</h3>
    <form class="form-group" action="<?php echo e(route('profile.resume')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input class="mt-3 form-control-file" name="resume" type="file">
        <input class="btn btn-primary mt-3" type="submit" value="Upload">
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/wyattjohnson/resources/views/admin/home.blade.php ENDPATH**/ ?>