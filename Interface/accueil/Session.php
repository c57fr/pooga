<?php namespace Gc7\Tuto;

require 'SessionInterface.php';
class Session implements SessionInterface, \Countable, \ArrayAccess {

	private $key, $value;

	/**
	 * Session constructor.
	 */
	public function __construct () {
		session_start();
	}

	public function get ( $key ) {
		if ( isset( $_SESSION[ $key ] ) ) {
			return $_SESSION[ $key ];
		}else return null;
	}

	public function set ( $key, $value ) {
		$_SESSION[ $key ] = $value;
	}

	public function delete ( $key ) {
		unset( $_SESSION[ $key ] );
	}

	/**
	 * Count elements of an object
	 * @link  http://php.net/manual/en/countable.count.php
	 * @return int The custom count as an integer.
	 * </p>
	 * <p>
	 * The return value is cast to an integer.
	 * @since 5.1.0
	 */
	public function count () {
		return 7;
	}

	/**
	 * Whether a offset exists
	 * @link  http://php.net/manual/en/arrayaccess.offsetexists.php
	 *
	 * @param mixed $offset <p>
	 *                      An offset to check for.
	 *                      </p>
	 *
	 * @return boolean true on success or false on failure.
	 * </p>
	 * <p>
	 * The return value will be casted to boolean if non-boolean was returned.
	 * @since 5.0.0
	 */
	public function offsetExists ( $offset ) {
		return isset( $_SESSION[ $offset ] );
	}

	/**
	 * Offset to retrieve
	 * @link  http://php.net/manual/en/arrayaccess.offsetget.php
	 *
	 * @param mixed $offset <p>
	 *                      The offset to retrieve.
	 *                      </p>
	 *
	 * @return mixed Can return all value types.
	 * @since 5.0.0
	 */
	public function offsetGet ( $offset ) {
		return $this->get( $offset );
	}

	/**
	 * Offset to set
	 * @link  http://php.net/manual/en/arrayaccess.offsetset.php
	 *
	 * @param mixed $offset <p>
	 *                      The offset to assign the value to.
	 *                      </p>
	 * @param mixed $value  <p>
	 *                      The value to set.
	 *                      </p>
	 *
	 * @return void
	 * @since 5.0.0
	 */
	public function offsetSet ( $offset, $value ) {
		return $this->set( $offset, $value );
	}

	/**
	 * Offset to unset
	 * @link  http://php.net/manual/en/arrayaccess.offsetunset.php
	 *
	 * @param mixed $offset <p>
	 *                      The offset to unset.
	 *                      </p>
	 *
	 * @return void
	 * @since 5.0.0
	 */
	public function offsetUnset ( $offset ) {
		return $this->delete( $offset );
	}
}
