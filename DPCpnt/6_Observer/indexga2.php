<?php
// ToDoLi Cf. Packagist League/Event
require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';
echo '<h2>Event Manager</h2>';


$manager = new Psr\EventManager\EventManager();

// On écoute les évènements
$manager->attach( 'database.delete.post', function ( \Gc7\DeletePostEvent $event ) {
	//unlink( __DIR__.'/'.$event->getTarget()->getImage());
	echo 'Suppression de : /DPCpnt/6_Observer/' . $event->getTarget()->getImage();
	?>
	<img src="<?= '/DPCpnt/6_Observer/' . $event->getTarget()->getImage() ?>" alt=""
	     style="border-radius:15px; width: 100%;margin-top: 100px;">
	<?php
} );

// Dans le controller
$post = new \Gc7\Post();
$manager->trigger( new \Gc7\DeletePostEvent( $post ) );
