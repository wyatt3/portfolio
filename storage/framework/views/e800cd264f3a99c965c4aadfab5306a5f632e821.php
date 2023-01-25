<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="mt-4">Projects</h1>
        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session('message')); ?></div>
        <?php endif; ?>
        <a href="<?php echo e(route('projects.add')); ?>" class="btn btn-outline-primary my-2">Add Project</a>
        <div class="row">
            <div class="col-12 col-lg-8">
                <table class="table table-dark table-striped text-center">
                    <tr>
                        <th>Title</th>
                        <th>Oneline</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a class="text-light underline" href="<?php echo e(route('projects.show', ['id' => $project->id])); ?>"><?php echo e($project->title); ?></a></td>
                        <td><?php echo e($project->oneline); ?></td>
                        <td><a href="<?php echo e(route('projects.edit', ['id' => $project->id])); ?>" class="btn btn-warning text-light">Edit</a></td>
                        <td><a href="<?php echo e(route('projects.delete', ['id' => $project->id])); ?>" class="btn btn-danger text-light">Delete</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/wyattjohnson/resources/views/admin/projects/home.blade.php ENDPATH**/ ?>