<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('admin.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary" onclick="window.location='<?php echo e(route('register')); ?>'">Přidat</button>
                        <table class="table table-hover">
                            <thead>
                            <th>Jméno</th>
                            <th>Email</th>
                            <th>Role</th>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->name); ?> </td>
                                    <td><?php echo e($user->email); ?> </td>
                                    <td><?php if($user->admin): ?>
                                            Admin
                                        <?php elseif($user->profesor): ?>
                                            Profesor
                                        <?php elseif($user->asistent): ?>
                                            Asistent
                                        <?php else: ?>
                                            Student
                                        <?php endif; ?></td>
                                    <td>
                                        <?php if(!$user->admin): ?>
                                        <form action="<?php echo e(url('user/delete', [$user->id])); ?>" method="POST">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                        </form>
                                        <?php endif; ?>
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