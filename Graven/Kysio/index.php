<h1 style="margin-top: 30px">Accueil Kysio</h1>
<hr>
<?php
require 'aGc7/AutoMenu/parts/helpers/htmlForm/BootstrapForm.php';
require 'aGc7/tools/helpers/Gc7Tip.php';
use AutoMenu\BootstrapForm;
use Gc7\Helper\Gc7Tip;

//require 'aGc7/AutoMenu/parts/helpers/htmlForm/Form.php';

var_dump( $_SERVER[ 'REMOTE_ADDR' ] );
$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
function captcha ( $response, $secret ) {
	$url  = 'https://www.google.com/recaptcha/api/siteverify';
	$data = [
		'secret'   => $secret,
		'response' => $response,
		'remoteip' => '127.0.0.1'

	];

	$options = [
		'http' => [
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query( $data )
		]
	];

	$context = stream_context_create( $options );
	$result  = file_get_contents( $url, FALSE, $context );
	var_dump( $result );

	return json_decode( $result )->success;
}

var_dump( $_POST );

if ( isset( $_POST[ 'g-recaptcha-response' ] ) ) {

	if ( ! ( captcha( $_POST[ 'g-recaptcha-response' ], "6LejQU0UAAAAAA8_NypFuXSBICWzv26LmRWs4Wep" ) ) ) {
		echo '<h1>Mauvais captcha</h1>';
	}
	else {
		echo '<h1 class="red">Bon captcha</h1>';
	}
}
else {
	$form = new BootstrapForm( $_POST );

	echo '<form method="post" action="#">
';
	echo '<h4>' . $form->input( 'Test de Formulaire' ) . '</h4>'
	     . $form->recaptchav2Test()
	     . $form->submitTxt( 'Tester' )
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
	?>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<?php
}


