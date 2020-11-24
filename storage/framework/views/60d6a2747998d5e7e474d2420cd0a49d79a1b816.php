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
    <div class="modal-title"><?php echo e($test->name); ?></div>
                <div class="left">Začátek: <?php echo e($test->start); ?></div>
                <div class="right">Trvání: <?php echo e((strtotime($test->end) - strtotime($test->start))/60); ?> minut </div>


                <?php $__currentLoopData = $test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3 class="left"> <?php echo e($question->name); ?></h3>
                    <p class="right">(Max: <?php echo e($question->scoreMax); ?> bodů)</p>
                    <p> <?php echo e($question->task); ?></p>
                    <p>
                        <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($loop->iteration); ?> <?php echo e($answer->answer); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>