<?php namespace AutoMenu;


/**
 * Class AutoMenu
 *
 * Genère code HTML pour un menu d'après les dossiers contenus
 * dans le dossier spécifié en paramètre
 *
 * @package Gc7\Divers\AutoMenu
 *
 * @version 1.0.0
 * @author  GC7
 */
class AutoMenu extends Gc7 {

	/**
	 * @var string Le code HTML du menu
	 */
	public $autoMenu = '';
	/**
	 * @var null Dossier de travail pour le menu
	 */
	private          $folder;
	protected static $dossier;

	/**
	 * Points de menu (Sous-dossiers nettoyé: Pas accueil ni autoMenu )
	 */
	private $dirs = [ ];


	/**
	 * @var string Title de la page
	 */
	public $title;

	public $page;


	/**
	 * @param string $folder Dossier de travail pour le menu
	 */
	public function __construct ( $folder = './' ) {
		parent::__construct();
		if ( $this->setFolder( $folder ) ) {
			//echo 'Mon dossier: ' . $folder;
			$doss          = explode( '/', $folder );
			self::$dossier = end( $doss );
			$this->getAutoMenu();
		}
		else {
			echo 'Err: No dossier à ce nom !';
		}
	}

	/**
	 * Ajoute / en fin de nom
	 *
	 * @param $folder
	 *
	 * @return bool TRUE si folder existe / FALSE sinon
	 */
	protected function setFolder ( $folder ) {
		if ( $folder[ - 1 ] !== '/' ) {
			$folder .= '/';
		}
		$this->folder = $folder;

		return is_dir( $folder );
	}

	/**
	 * @return null
	 */
	public function getFolder () {
		if ( GC7 ) {
			return $this->folder;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * Fonction callback pour nettoyer liste des dossiers
	 * (Avec array_filter ci-après)
	 *
	 * @param $v
	 * @param $k
	 *
	 * @return bool
	 */
	private function nett ( $v, $k ) {
		return ( $k > 1 && is_dir( $this->folder . $v ) && $v !== 'accueil' && $v !== 'autoMenu' );
	}

	/**
	 * Génère l'automenu
	 */
	protected function getAutoMenu () {
		$dirs = scandir( $this->folder );
		$p    = $_GET[ 'p' ] ?? 'acceuil';
		//var_dump( $p );
		//var_dump( $this );
		$dirs       = array_filter( $dirs, [ $this, 'nett' ], ARRAY_FILTER_USE_BOTH );
		$this->dirs = $dirs;

		$html = '';
		//$html = '<ul class="navbar-nav rowItems">';
		foreach ( $dirs as $d ) {
			$html .= '<a class="nav-item nav-link ' . ( ( $d === $p ) ? 'active'
					: '' ) . '" href="/?p=' . $d . '"> ' . ucfirst( $d ) . '</a>' . "\n";
		}
		//$html.='</ul>';

		$this->autoMenu = $html;
		//var_dump($this);
	}
	
	/**
	 * @param $p string nom de la page appelée ( $_GET['p'] )
	 */
	public function action ( $p, $pg = null ) {
		$this->title = ucfirst( $p );
		$cible       = ( isset( $pg ) ) ? $pg : 'index.php';
		//var_dump( [ 'p', $p, $this->dirs ] );
		if ( in_array( $p, $this->dirs ) || $p === 'accueil' ) {
			//var_dump( $this->folder . $p . '/' . $cible );

			require $this->folder . $p . '/' . $cible;
		}
		else {
			echo '<h1>Cette page n\'existe pas !</h1>';
		}
	}
	
	public static function getAppName () {
		return self::$dossier;
	}
}
