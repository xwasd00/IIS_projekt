<?php $__env->startSection('title'); ?>
    <?php echo $__env->make('profesor.title', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-hover">
                    <tr>
                        <td>
                            <h3 class="modal-title"><?php echo e($test->name); ?></h3>
                            <div class="left">Začátek: <?php echo e($test->start); ?></div>
                            <div class="right">Trvání: <?php echo e((strtotime($test->end) - strtotime($test->start))/60); ?> minut </div>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="window.location='<?php echo e(route('profesor.addqst', [$test->id])); ?>'">Přidat otázku</button>
                        </td>
                    </tr>
                </table>
                <table class="table table-hover">
                    <thead>
                        <th>Otázka</th>
                        <th>Maximum bodů</th>
                        <th>Znění</th>
                        <th>Správná odpověď</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $test->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="left"> <?php echo e($question->name); ?></td>
                            <td class="right">(Max: <?php echo e($question->scoreMax); ?> bodů)</td>
                            <td> <?php echo e($question->task); ?></td>
                            <td>
                                <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($loop->iteration); ?> <?php echo e($answer->answer); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <button class="btn btn-warning" onclick="window.location='<?php echo e(route('profesor.modifyqst', [$question->id])); ?>'">Upravit otázku</button>
                            </td>
                            <td>
                                <form action="<?php echo e(route('question.deleteQ', [$question->id])); ?>" method="POST">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <?php echo e(csrf_field()); ?>

                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <button class="btn btn-warning" onclick="window.location='<?php echo e(route('profesor')); ?>'">Zpět</button>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>