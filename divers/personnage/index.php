<?php namespace Gc7\Divers\Personnage;

spl_autoload_register(function ($class) {
    $arr = explode('\\', $class);
    include end($arr) . '.php';
});

$vue = function(){
    $args = func_get_args();
    echo '<pre>';
    print_r ($args);
    echo '</pre>';
};

$merlin  = new Personnage('Merlin');
$harry   = new Personnage('Harry');
$legolas = new Archer('Legolas', 70);

$vue($harry, $legolas);
echo 'Legolas attaque Harris';
$legolas->attaque($harry);
$vue($harry, $legolas);




echo '<hr>';

$merlin = new Personnage('Merlin');
$harry  = new Personnage('Harry');
$merlin->regenerer();

$vue($merlin, $harry, $legolas);

