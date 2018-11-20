<?php namespace Adapter\GA;


use Doctrine\Common\Cache\Cache;

class DoctrineCacheAdapter implements CacheInterface {

	private $cache;
	
	/**
	 * DoctrineCacheAdapter constructor.
	 */
	public function __construct ( Cache $cache ) {
		$this->cache = $cache;
	}

	public function get ( $key ) {
		return $this->cache->fetch( $key );
	}

	public function has ( $key ) {
		return $this->cache->contains( $key );
	}

	public function set ( $key, $value, $expiration = 3600 ) {
		$this->cache->save( $key, $value, $expiration );
	}
}

