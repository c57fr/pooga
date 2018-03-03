<?php namespace Core\HTML;

/**
 * Class Form
 * @package Gc7
 */
class Form {

	/**
	 * @var data array || object
	 */
	/**
	 * @var string HTML
	 */
	private $data, $surround = 'p';

	/**
	 * @param array || object $data
	 */
	public function __construct ( $data = [ ] ) {
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
	 * @param $index arr || object
	 *
	 * @return null
	 */
	protected function getValue ( $index ) {

		if ( is_object( $this->data ) ) {
			return $this->data->$index;
		}

		return $this->data[ $index ] ?? null;
	}

	/**
	 * @param $champs
	 *
	 * @return string
	 */
	public function input ( $champs, $label = null, $options = [ ] ) {
		$label = $label ?? $champs;
		$type  = $options[ 'type' ] ?? 'text';

		return $this->surround( '
		<label for "' . $champs . '">' . ucfirst( $label ) . '</label>
		<input type="' . $type . '" name="' . $champs . '" id="' . $champs . '" value="' . $this->getValue( $champs ) . '" />' );
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
