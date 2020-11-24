<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('profesor.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('profesor.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Profesor page</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>začátek</th>
                            <th>časový limit</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($test->name); ?> </td>
                                    <td><?php echo e($test->start); ?> </td>
                                    <td><?php echo e((strtotime($test->end) - strtotime($test->start))/60); ?> minut </td>
                                    <td>
                                        <button class="btn btn-primary" onclick="window.location='<?php echo e(url('profesor/show', [$test->id])); ?>'"> Detail </button>
                                    </td>
                                </tr>
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