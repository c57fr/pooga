<?php namespace Gc7\Tuto;


class Flash {

	/**
	 * @var Session
	 */
	private $session;

	const KEY = 'gFlash';
	
	/**
	 * Flash constructor.
	 */
	public function __construct ( Session $session ) {
		$this->session = $session;
	}

	public function set ( $message, $type = 'success' ) {

		$this->session->set( self::KEY, [
			'message' => $message,
			'type'    => $type
		] );

	}
	
	public function get () {
		$flash = $this->session->get( self::KEY );
		$this->session->delete( self::KEY );

		return "<div class='alert alert-{$flash['type']}'>{$flash['message']}</div>";
	}
}
