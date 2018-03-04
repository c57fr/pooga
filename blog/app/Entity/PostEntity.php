<?php namespace App\Entity;


use Core\Entity\Entity;

class PostEntity extends Entity {

	public $dateFr;

	/**
	 * PostEntity constructor
	 */
	public function __construct () {
		$this->dateFr = $this->dateFr();
	}


	public function getUrl () {
		return 'index.php?p=article&id=' . $this->id;
	}

	public function getExtrait () {
		$html = '<p>' . substr( $this->contenu, 0, 100 ) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

		return $html;
	}

	private function dateFr () {
		$d = $this->date;

		return substr( $d, 8, 2 ) . '/' . substr( $d, 5, 2 ) . '/' . substr( $d, 0, 4 ) . substr( $d, 10 );
	}

}
