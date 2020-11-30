<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('student.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row jtify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="h3"> Profil</p>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <td>Name: </td>
                                <td><?php if($edit): ?>
                                        <form class="form-horizontal" method="POST" action="">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="col-lg-6"><input id="name" type="text" class="form-control" name="name"
                                                         value="<?php echo e($user->name); ?>"></div>

                                            <button type="submit" class="btn btn-primary">
                                                Uložit
                                            </button>
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </form>
                                    <?php else: ?>
                                        <?php echo e($user->name); ?>

                                        <button class="btn btn-primary" onclick="window.location='<?php echo e(route('profile.edit')); ?>'">Upravit</button>
                                    <?php endif; ?></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><?php echo e($user->email); ?></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-primary" onclick="window.location='<?php echo e(route('password.reset', ['id' => $user->id])); ?>'">Změnit heslo</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>