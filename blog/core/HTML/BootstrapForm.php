<?php namespace Core\HTML;

require 'Form.php';

class BootstrapForm extends Form {


	public function input ( $champs, $label = null, $options = [ ] ) {
		$label = $label ?? $champs;
		$type  = $options[ 'type' ] ?? 'text';

		return $this->surround( '
		<label for "' . $champs . '" class="col-3 col-form-label tal">' . ucfirst( $label ) . '</label>
		<input type="' . $type . '" name="' . $champs . '" id="' . $champs . '" value="' . $this->getValue( $champs ) . '"  class="col-sm-8 form-control" />' );
	}

	/**
	 * @param $html
	 *
	 * @return string
	 */
	protected function surround ( $html ) {
		return '<div class="form-inline">' . $html . '
	</div>

';
	}

	public function getValue($champs) {
		return 'demo';
	}


	/**
	 * @return string
	 */
	public function submit ($text='Envoyer') {
		return '
		<br>&nbsp;<button type="submit" class="btn">'.$text.'</button>
		';
	}

}
