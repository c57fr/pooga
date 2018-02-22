<?php

function recursiveCopy ( $source, $destination ) {
	if ( ! file_exists( $destination ) ) {
		// Ajout de time() à $destination pour avoir noms différents pour tests
		//$destination.=time();

		//echo '<h1>MKDIR "'.$destination.'"</h1>'; // ok
		mkdir( $destination );
	}

	$splFileInfoArr = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $source ), RecursiveIteratorIterator::SELF_FIRST );

	foreach ( $splFileInfoArr as $fullPath => $splFileinfo ) {
//skip . ..
		if ( in_array( $splFileinfo->getBasename(), [ ".", ".." ] ) ) {
			continue;
		}
//get relative path of source file or folder
		$path = str_replace( $source, "", $splFileinfo->getPathname() );

		if ( $splFileinfo->isDir() ) {
			mkdir( $destination . "/" . $path );
			//echo'<h1>MKDIR'.$destination . "/" . $path.'</h1>'; // ok
		}
		else {
			copy( $fullPath, $destination . "/" . $path ); // ok
		}
	}
}

#call the function
// recursiveCopy($source, $destination);
