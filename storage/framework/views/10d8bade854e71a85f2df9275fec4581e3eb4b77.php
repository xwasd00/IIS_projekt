<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('student.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('student.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Registrace testů</p>

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
                                        <?php if($test->registred): ?>
                                            <button class="btn right" disabled>Registrován</button>
                                        <?php else: ?>
                                            <form class="right" action="<?php echo e(url('student/reg')); ?>" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" id="test_id" name="test_id" value="<?php echo e($test->id); ?>">
                                                <button class="btn btn-primary" type="submit">Registrovat</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>