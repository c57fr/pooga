<?php
use Gc7\Divers\HtmlForm\BootstrapForm;

$form = new BootstrapForm( $_POST );
echo '<form method="post" action="#">
';
echo $form->input( 'username' )
     . $form->input( 'password' )
     . $form->submit()
     . '</form>';

$n = $form->date();
echo $n->format( 'd/m/Y - H:i:s' );

