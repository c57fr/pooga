<?php namespace Core\HTML;

require 'Form.php';

class BootstrapForm extends Form {


	public function input ( $name, $label = null, $options = [ ] ) {
		$type  = $options[ 'type' ] ?? 'text';
		$label = $label ?? $name;
		$label = '<label for "' . $name . '" class="col-3 col-form-label tal">' . ucfirst( $label ) . '</label>';

		if ( $type === 'textarea' ) {
			$input = '<textarea name="' . $name . '" id="' . $name . '"  class="col-sm-8 form-control" rows="7">' . $this->getValue( $name ) . '</textarea>';
		}
		else {
			$input = '<input type="' . $type . '" name="' . $name . '" id="' . $name . '" value="' . $this->getValue( $name ) . '"  class="col-sm-8 form-control" />';
		}

		return $this->surround( $label . $input );
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

	// todoli Supprimer cette fonction qui juste rempli
	// le formulaire pour tests
	public function getValueHack ( $champs ) {
		return 'demo';
	}
	
	public function select ( $name, $label = null, $options ) {
		$label = $label ?? $name;
		$label = '
		<label for "' . $name . '" class="col-3 col-form-label tal">' . ucfirst( $label ) . '</label>';
		$input = '
		<select class="form-control" name="' . $name . '">';
		foreach ( $options as $k => $v ) {
			$attributes = '';
			//var_dump($k , $this->getValue( $name )*1);
			if ( $k === $this->getValue( $name )*1 ) {
				$attributes = 'selected';
			}
			$input .= '<option value = "' . $k . '" ' . $attributes . '>' . $v . '</otion>
			';
		}
		$input .= '</select>
<br/>&nbsp;<br/>&nbsp;';

		return $this->surround( $label . $input );
	}


	/**
	 * @return string
	 */
	public function submit ( $text = 'Envoyer' ) {
		return '
		<br>&nbsp;<button type="submit" class="btn btn-primary btn-inverse-primary">' . $text . '</button>
		';
	}

}
