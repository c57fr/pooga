<?php namespace Gc7\Divers\HtmlForm;

/**
 * Class Form
 * @package Gc7
 */
class Form {

	/**
	 * @var array
	 */
	/**
	 * @var array
	 */
	private $data, $surround = 'p';

	/**
	 * @param array $data
	 */
	public function __construct ( array $data = [ ] ) {
		$this->data = $data;
	}

	/**
	 * @param $html
	 *
	 * @return string
	 */
	protected function surround ( $html ) {
		return "    <{$this->surround}>{$html}
	</{$this->surround}>

";
	}

	/**
	 * @param $index
	 *
	 * @return null
	 */
	protected function getValue ( $index ) {
		return $this->data[ $index ] ?? null;
	}

	/**
	 * @param $champs
	 *
	 * @return string
	 */
	public function input ( $champs ) {
		return $this->surround( '
		<label for "' . $champs . '">' . ucfirst( $champs ) . '</label>
		<input type="text" name="' . $champs . '" id="' . $champs . '" value="' . $this->getValue( $champs ) . '" />' );
	}

	/**
	 * @return string
	 */
	public function submit () {
		return $this->surround( '
		<button type="submit">Envoyer</button>' );
	}

	public function date () {
		return new \DateTime();
	}

}
