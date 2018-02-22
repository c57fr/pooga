<?php

function recursiveCopy ( $source, $destination ) {
	if ( ! file_exists( $destination ) ) {
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
		}
		else {
			copy( $fullPath, $destination . "/" . $path );
		}
	}
}

#calling the function
//recursiveCopy(__DIR__ . '/assets/helpers/folderTemplate', __DIR__ . '/../NN');
