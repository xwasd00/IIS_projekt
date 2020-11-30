<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('student.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Aktivní testy</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název</th>
                            <th>začátek</th>
                            <th>časový limit</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($test->test->end > date("Y-m-d H:i:s", time()) && $test->approved && !$test->finished): ?>
                                <tr>
                                        <td><?php echo e($test->test->name); ?> </td>
                                        <td><?php echo e($test->test->start); ?> </td>
                                        <td><?php echo e((strtotime($test->test->end) - strtotime($test->test->start))/60); ?> minut</td>
                                        <?php if($test->test->start < date("Y-m-d H:i:s", time())): ?>
                                            <td><button class="btn btn-primary" onclick="window.location='<?php echo e(url('student/testfill', [$test->test->id])); ?>'">Začít</button></td>
                                        <?php endif; ?>
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