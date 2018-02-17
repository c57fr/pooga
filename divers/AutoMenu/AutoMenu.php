<?php namespace Gc7\Divers\AutoMenu;


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
class AutoMenu {

	/**
	 * @var string Le code HTML du menu
	 */
	public $autoMenu = '';
	/**
	 * @var null Dossier de travail pour le menu
	 */
	private $folder;

	/**
	 * Points de menu (Sous-dossiers nettoyé: Pas accueil ni autoMenu )
	 */
	private $dirs = [ ];

	/**
	 * @var string Title de la page
	 */
	public $title;


	/**
	 * @param string $folder Dossier de travail pour le menu
	 */
	public function __construct( $folder = './' )
	{
		if ( $this->setFolder( $folder ) ) {
			//echo 'Mon dossier: ' . $this->folder;
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
	protected function setFolder( $folder )
	{
		if ( $folder[ - 1 ] !== '/' ) {
			$folder .= '/';
		}

		$this->folder = $folder;

		return is_dir( $folder );
	}

	/**
	 * @return null
	 */
	public function getFolder()
	{
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
	private function nett( $v, $k )
	{
		return ( $k > 1 && is_dir( $this->folder . $v ) && $v !== 'accueil' && $v !== 'autoMenu' );
	}

	/**
	 * Génère l'automenu
	 */
	protected function getAutoMenu()
	{
		$dirs       = scandir( $this->folder );
		$dirs       = array_filter( $dirs, [ $this, 'nett' ], ARRAY_FILTER_USE_BOTH );
		$this->dirs = $dirs;

		$html = '';
		foreach ( $dirs as $d ) {
			$html .= ' | <a href="/?p=' . $d . '">' . ucfirst( $d ) . '</a>' . "\n";
		}
		$this->autoMenu = $html;
	}
	
	/**
	 * @param $p string nom de la page appelée ( $_GET['p'] )
	 */
	public function action( $p )
	{
		$this->title = ucfirst( $p );
		//var_dump( 'p', $p, $this->dirs );
		if ( in_array( $p, $this->dirs ) || $p === 'accueil' ) {
			require $this->folder . $p . '/index.php';
		}
		else {
			echo '<h1>Cette page n\'existe pas !</h1>';
		}
	}
}
