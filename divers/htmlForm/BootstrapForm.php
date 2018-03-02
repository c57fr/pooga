<?php namespace Gc7\Divers\HtmlForm;

require 'Form.php';

use Gc7\Divers\HtmlForm\Form;

class BootstrapForm extends Form {

	public function input ( $name ) {
		return $this->surround( '
		<label for "' . $name . '">' . ucfirst( $name ) . '</label>
		<input type="text" name="' . $name . '" id="' . $name . '" value="' . $this->getValue( $name ) . '" />' );
	}

	/**
	 * @param $html
	 *
	 * @return string
	 */
	protected function surround ( $html ) {
		return '<div class="form-group">' . $html . '
	</div>

';
	}


	/**
	 * @return string
	 */
	public function submit () {
		return $this->surround( '
		<button type="submit" class="btn">Envoyer</button>' );
	}

}
