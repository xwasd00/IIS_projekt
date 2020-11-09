<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/global-style.css')); ?>"/>
</head>
<body>
<?php echo $__env->make('partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
