<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Mail</h1>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-primary"><?php echo e(Session('message')); ?></div>
    <?php endif; ?>

    <table style="width:50%;" class="table table-dark table-striped text-center">
        <tr>
            <th>From</th>
            <th>Delete</th>
        </tr>
        <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a href="#" data-toggle="modal" data-target="#modal-mail-<?php echo e($mail->id); ?>"><?php echo e($mail->email); ?></a></td>
            <td><a class="btn btn-danger" href="<?php echo e(route('mail.delete', ['id' => $mail->id])); ?>">Delete</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php $__currentLoopData = $mails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="modal-mail-<?php echo e($mail->id); ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-secondary text-light">
                <div class="modal-body">
                    <button type="button" class="close text-light" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <p>
                        <strong>Name: </strong><?php echo e($mail->name); ?><br>
                        <strong>Reply Email: </strong><?php echo e($mail->email); ?><br>
                        <strong>Message: </strong><br>
                        <?php echo e($mail->message); ?>

                    </p>
                </div>
                <div class="modal-footer" style="border-top: solid 1px #222c3b">
                    <button type="button" class="btn btn-warning mr-auto text-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/wyattjohnson/resources/views/admin/mail.blade.php ENDPATH**/ ?>