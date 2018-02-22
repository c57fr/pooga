<?php
use Gc7Ga\BootstrapForm;
use Gc7Ga\Gc7;

require dirname( __DIR__ ) . '/helpers/htmlForm/BootstrapForm.php';

?>

	<h1>Admin</h1>
	<p><a href="../">POOGA</a></p>

<?php
$form = new BootstrapForm( $_POST );

echo '<form method="post" action="#">
';
echo '<h4>'.$form->input( 'Nom du dossier' ).'</h4>'
     . $form->submit()
     . '</form>';

$n = $form->date();
//echo $n->format( 'd/m/Y - H:i:s' );
$jsScript = '
<script type="text/javascript">

	$(document).ready(function () {
		console.log("oki");
		$("#nomDuDossier").focus()
		.css({"background-color": "cornsilk",
		 "padding":" 5px 10px"});
	});

</script>';
