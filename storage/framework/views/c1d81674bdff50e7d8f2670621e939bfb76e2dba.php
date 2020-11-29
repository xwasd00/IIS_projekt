<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('asistent.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <p>Registrace testů</p>

                        <table class="table table-hover">
                            <thead>
                            <th>Název testu</th>
                            <th>Jméno studenta</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $instances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($instance->test->end > date("Y-m-d H:i:s")): ?>
                                    <tr>
                                        <td><?php echo e($instance->test->name); ?> </td>
                                        <td><?php echo e($instance->user->name); ?> </td>
                                        <td><button class="btn btn-primary" href="">Zaregistrovat studenta</button></td>
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