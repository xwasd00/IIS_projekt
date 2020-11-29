<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('student.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row jtify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> Profil</p>
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <th><?php echo e($user->name); ?></th>
                                <th><?php echo e($user->email); ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>