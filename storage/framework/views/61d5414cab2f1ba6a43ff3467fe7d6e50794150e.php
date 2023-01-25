<?php $__env->startSection('content'); ?>

<div class="container">
        <h1 class="mt-4">Updates</h1>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session('message')); ?></div>
        <?php endif; ?>
        <a href="<?php echo e(route('updates.add')); ?>" class="btn btn-outline-primary my-2">New Post</a>
        <div class="row">
            <div class="col-12 col-lg-6">
                <table class="table table-dark table-striped text-center">
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a class="text-light underline" href="<?php echo e(route('updates.show', ['id' => $post->id])); ?>"><?php echo e($post->title); ?></a></td>
                        <td><a href="<?php echo e(route('updates.edit', ['id' => $post->id])); ?>" class="btn btn-warning text-light">Edit</a></td>
                        <td><a href="<?php echo e(route('updates.delete', ['id' => $post->id])); ?>" class="btn btn-danger text-light">Delete</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/wyattjohnson/resources/views/admin/updates/home.blade.php ENDPATH**/ ?>