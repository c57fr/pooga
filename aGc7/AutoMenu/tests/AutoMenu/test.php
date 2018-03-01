<?php
require __DIR__ .'/../vendor/autoload.php';
$automenu = AutoMenu\Factory::create();
$automenu->add('Service');

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<section>
	<?php $automenu->show(); ?>
</section>
