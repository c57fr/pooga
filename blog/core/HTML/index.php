<?php
require 'BootstrapForm.php';

use Gc7\Divers\HtmlForm\BootstrapForm;


$form = new BootstrapForm( $_POST );
echo '<form method="post" action="#">
';
echo $form->input( 'username' )
     . $form->input( 'password' )
     . $form->submit()
     . '</form>';

$d = $form->date();
echo $d->format( 'd/m/Y - H:i:s' );

