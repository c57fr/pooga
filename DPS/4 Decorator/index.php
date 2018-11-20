<?php namespace Decorator\GA; ?>
<h1 style="margin-top: 30px"><a href="https://github.com/design-patterns-for-humans/French#-decorator"
                                target="_blank">Design Pattern Decorator</a></h1>
<a href="https://www.grafikart.fr/formations/programmation-objet-php/pattern-decorator" target="_blank">Vu /
	GA</a> (...)
<hr>
<?php
require dirname( __DIR__ ) . '/autoloader.php';
//require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';


$hello = new Hello();
echo $hello->sayHello() . '<br>=> ';
$hello = new CaVaDecorator( $hello );
echo $hello->sayHello() . '<br>=> ';
$hello = new MerciDecorator( $hello );
echo $hello->sayHello();

