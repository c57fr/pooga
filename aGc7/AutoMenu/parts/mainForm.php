<?php namespace AutoMenu;

require  __DIR__ . '/helpers/htmlForm/BootstrapForm.php';

?>
	<h1>Admin AutoMenu <span class="modeDev"><em>(Dev)</em></span></h1>
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
		.css({"background-color": "white",
		 "padding":"5px 10px", "border-radius":"4px"});
	});

</script>';
