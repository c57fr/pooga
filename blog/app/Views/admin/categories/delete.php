<?php
use \Core\HTML\BootstrapForm;

$category = $app->getTable( 'Category' );

if ( ! empty( $_POST ) ) {

	$result = $category->delete( $_POST[ 'id' ] );

	if ( $result ) {
		header( 'Location:/?a=categories.index' );
	}
}
