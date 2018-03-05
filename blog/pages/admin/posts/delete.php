<?php
use \Core\HTML\BootstrapForm;

$postTable = $app->getTable( 'Post' );

if ( ! empty( $_POST ) ) {

	$result = $postTable->delete( $_POST[ 'id' ] );

	if ( $result ) {
		header( 'Location:/?a=admin' );
	}
}
