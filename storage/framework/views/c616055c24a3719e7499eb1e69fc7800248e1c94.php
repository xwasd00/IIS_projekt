<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('student.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>Hodnocení testů</p>
                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>Hodnocení</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($test->test->end < date("Y-m-d H:i:s")): ?>
                                    <tr>
                                        <td><?php echo e($test->test->name); ?> </td>
                                        <td>
                                        <?php if($test->test->evaluated): ?>
                                            <?php echo e($test->test->score); ?>

                                        <?php else: ?>
                                                <span>Nezadáno</span>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>