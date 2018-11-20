<h1><a href="https://github.com/design-patterns-for-humans/French#-builder" target="_blank">Design Pattern Builder</a>
</h1><?php

include 'autoloader.php';
use DP\Builder\BurgerBuilder;

?>

<h3>Processus de fabrication en plusieurs étapes</h3>

<?php


$burger = ( new BurgerBuilder( 14 ) )
	->addPepperoni()
	->addLettuce()
	->addTomato()
	->build();
echo '<pre>';
var_dump( $burger );
print_r ($burger);
echo '</pre>';


echo 'Voir aussi exemple de <b><a href="/?c=blog/public&p=demo.index" target="_blank">QueryBuilder</a></b><br>
(Dans blog/app/Controller/DemoController) :
';
$code=<<<'EOT'
<pre><code>
echo $query
  ->select( 'id', 'titre', 'contenu' )
  ->from( 'articles', 'posts' )
  ->where( 'id = 2' )
  ->where( 'posts.category_id = 1' )
  ->where( 'posts.date > NOW()' );

</code></pre>
EOT;
echo $code;

