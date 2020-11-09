<div id="menu">
    <div id="menu_logo">FITest</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='<?php echo e(route('prof_menu')); ?>'">Menu</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='<?php echo e(route('profile')); ?>'">Profil</div>
    <div class="menu_button" style="cursor: pointer">Vytvořit test</div>
    <div class="menu_button" style="cursor: pointer">Spustit test</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='<?php echo e(route('test_reg')); ?>'">Registrace testů</div>
    <div class="menu_button" style="cursor: pointer" onclick="window.location='<?php echo e(route('my_tests')); ?>'">Moje testy</div>

    <div id="logout">
        <a href="<?php echo e(route('index')); ?>">Odhlásit se</a>
    </div>
</div>
<div id="page-content">

</div>
