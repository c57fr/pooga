<?php namespace Adapter\GA;


interface CacheInterface {

	public function get ( $key );

	public function has ( $key );

	public function set ( $key, $value, $expiration = 3600 );

}
