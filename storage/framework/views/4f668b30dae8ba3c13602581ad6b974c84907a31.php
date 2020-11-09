<!DOCTYPE html>
<html>
<head>
    <title>TODO supply a title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/global-style.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/index-style.css')); ?>" />
</head>
<body>
<div id="menu">
</div>
<div id="page-content">
    <h1 id="welcome-h1">Testový portál FIT</h1>
    <div id="welcome-text">Zde bude úvodní text</div>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('student_menu')); ?>'">Přihlásit se jako student</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('asist_menu')); ?>'">Přihlásit se jako asistent</button>
    <button class="welcome-button" style="cursor: pointer" onclick="window.location='<?php echo e(route('prof_menu')); ?>'">Přihlásit se jako Profesor</button>
</div>
</body>
</html>