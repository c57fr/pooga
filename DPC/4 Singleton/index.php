<h1><a href="https://github.com/design-patterns-for-humans/French#-singleton" target="_blank">Design Pattern
		Singleton</a></h1><?php

use DPC\Singleton\President;

include 'autoloader.php';


$president1 = President::getInstance();
$president2 = President::getInstance();
$president3 = President::getInstance();

echo '<br>Malgré que appelée 3 fois...:<br>';
if ( $president1 === $president2 && $president1 === $president3 ) {
	echo 'Il n\'y a toujours qu\'un seul et même président !<br><br>';
}


$code = <<<'EOT'
<pre><code>
$president1 = President::getInstance();
$president2 = President::getInstance();
$president3 = President::getInstance();

echo 'Malgré que appelée 3 fois...: ';
if ( $president1 === $president2 && $president1 === $president3 ) {
	echo 'Il n\'y a toujours qu\'un seul et même président !';
}

</code></pre>
EOT;

$codeClasse = <<<'EOT'
<pre><code>
class President {

  private static $_instance;

  public function __construct () {
    echo 'President créé';
  }


  public static function getInstance ():President {
    if ( ! self::$_instance ) {
      self::$_instance = new self();
    }
    echo 'Instance President appelée<br>';

    return self::$_instance;
  }
}

</code></pre>
EOT;

echo '<p>Le code appelant :</p>'.$code;
echo '<p>La classe President :</p>'.$codeClasse;
