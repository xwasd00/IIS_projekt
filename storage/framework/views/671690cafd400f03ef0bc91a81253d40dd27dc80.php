<?php $__env->startSection('title'); ?>
    Testový portál FIT
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div id="welcome-text">Zde bude úvodní text</div>
    <button class="btn btn-primary" onclick="window.location='<?php echo e(route('student')); ?>'">Přihlásit se jako student</button>
    <button class="btn btn-primary" onclick="window.location='<?php echo e(route('asistent')); ?>'">Přihlásit se jako asistent</button>
    <button class="btn btn-primary" onclick="window.location='<?php echo e(route('profesor')); ?>'">Přihlásit se jako Profesor</button>
    <button class="btn btn-primary" onclick="window.location='<?php echo e(route('admin')); ?>'">Admin</button>
    <?php if(session('error')): ?>
        <span class="help-block">
            <strong><?php echo e(session('error')); ?></strong>
        </span>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>