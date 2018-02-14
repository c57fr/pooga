<?php
use Gc7\HTML\BootstrapForm;

require './vendor/autoload.php';


$form = new BootstrapForm( $_POST );
echo '<form method="post" action="#">
';
echo $form->input( 'username' )
     . $form->input( 'password' )
     . $form->submit()
     . '</form>';

$n = $form->date();
echo $n->format( 'd/m/Y - H:i:s' );

