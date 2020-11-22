<?php $__env->startSection('content'); ?>

<div id="menu">
</div>
<div id="page-content">
    <h1 id="welcome-h1">Testový portál FIT</h1>
    <div id="welcome-text">Zde bude úvodní text</div>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('student_menu')); ?>'">Přihlásit se jako student</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('asist_menu')); ?>'">Přihlásit se jako asistent</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('prof_menu')); ?>'">Přihlásit se jako Profesor</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('admin')); ?>'">Admin</button>
    <?php if(session('error')): ?>
        <span class="help-block">
            <strong><?php echo e(session('error')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>