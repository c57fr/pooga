<?php namespace Adapter\GA;


class Hello {

	public function sayHello ( CacheInterface $cache ) {
		if ( $cache->has( 'hello' ) ) {
			return $cache->get( 'hello' );
		}
		else {
			sleep( 10 ); // On simule un script lent
			$content = 'Bonjour !';
			$cache->set( 'hello', $content );

			return $content;
		}
	}

}
