<h1>Login</h1><?php
require ROOT . 'core/HTML/BootstrapForm.php';
use \Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;

if ( ! empty( $_POST ) ) {
echo 'Analyse du form';
	$auth = new DBAuth( $app->getDB() );
	if ( $auth->login( $_POST[ 'username' ], $_POST[ 'password' ] ) ) {
		//var_dump($auth);
		$_SESSION['auth']='ok';
		//header( 'Location: /?p=admin' );
	}
	else {
		?>
		<div class="alert alert-danger">Identifiant incorrect !</div>
		<?php
	}
}

$form = new BootstrapForm( $_POST );
?>
<form method="post">
	<?= $form->input( 'username', 'Pseudo' )
	    . $form->input( 'password', 'Mot de passe', [ 'type' => 'password' ] )
	    . $form->submit( 'Se loguer' ) ?>
</form>
