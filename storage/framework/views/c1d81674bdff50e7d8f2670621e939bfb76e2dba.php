<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('asistent.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <p>Registrace žáků</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název testu</th>
                            <th>Jméno studenta</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $instances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($instance->test->end > date("Y-m-d H:i:s") && !$instance->approved): ?>
                                    <tr>
                                        <td><?php echo e($instance->test->name); ?> </td>
                                        <td><?php echo e($instance->user->name); ?> </td>
                                        <td>
                                        <form class="right" action="<?php echo e(url('asistent/reg')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" id="test_id" name="test_id" value="<?php echo e($instance->id); ?>">
                                            <button class="btn btn-primary" type="submit">Registrovat studenta</button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>