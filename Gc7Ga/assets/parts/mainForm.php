<?php
use Gc7Ga\BootstrapForm;

require dirname( __DIR__ ) . '/helpers/htmlForm/BootstrapForm.php';

?>

	<h1>Admin</h1>
	<p><a href="../">POOGA</a></p>

<?php
$form = new BootstrapForm( $_POST );
echo '<form method="post" action="#">
';
echo $form->input( 'Nom du dossier' )
     . $form->submit()
     . '</form>';

$n = $form->date();
//echo $n->format( 'd/m/Y - H:i:s' );

