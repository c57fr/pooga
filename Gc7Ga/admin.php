<?php namespace Gc7Ga;

require 'Gc7.php';
require 'assets/helpers/classes/Notif.php';

class Admin extends Gc7 {

	protected $folders, $new;
	private static      $_adminInstance;

	public static function getInstance () {
		if ( ! self::$_adminInstance ) {
			self::$_adminInstance = new Admin();

			//var_dump( 'iniInstance', self::$_adminInstance );
		}

		//echo $_SERVER['REQUEST_URI'];
		return self::$_adminInstance;
	}

	public function __construct () {
		parent::__construct();

		//var_dump( 'ConstrAdmin', $this );
	}

	public function __destruct () {

		// À activer pour débugage
		var_dump( [ '$_GET', $_GET, '$_COOKIE', $_COOKIE, 'Destr', $this ] );
	}

	protected function arrayDiff ( $A, $B ) {
		$intersect = array_intersect( $A, $B );
		return array_merge( array_diff( $A, $intersect ), array_diff( $B, $intersect ) );
	}

	/**
	 * Fonction callback pour nettoyer liste des dossiers
	 * (Avec array_filter ci-après)
	 *
	 * @param $v
	 *
	 * @return string || void
	 */
	private function nett ( $v ) {
		$protectedFolders = [ 'Gc7Ga', 'vendor' ];

		return ( $v[ 0 ] !== '.' && is_dir( $this->pathUp . $v ) && ! in_array( $v, $protectedFolders ) );
	}

	public function getFolders ( $dir = null ) {
		$this->pathUp = $this->getPathUp();
		$res          = array_filter( scandir( dirname( __FILE__, 2 ) ), [ $this, 'nett' ] );

//var_dump($res, is_dir('../blog/'), is_dir('../divers/'));
		return $res;
	}

	public function Html () {
		// Code HTML
		$html = "\n";
		foreach ( $this->folders as $d ) {
			$html .= ' | <a href="/?p=' . $d . '">' . ucfirst( $d ) . '</a>' . "\n";
		}
		//var_dump( $html );
	}

	protected function getNew () {
		//$arr = $this->folders;
		$reservedApps = [ 'blog', 'divers' ];

		$arrs = [ 'apps', 'folders' ];

		foreach ( $arrs as $arr ) {
			var_dump( [ $arr, $this->$arr ] );
			$this->new{$arr} = array_diff( $this->$arr, $reservedApps );
		}

		var_dump( array_diff( $arrs, $reservedApps ) );

		return array_diff( $arrs, $reservedApps );
		//return $this->new;
	}


	public function getDossActuels () {

		$sces = $this->getApps(); // <= Json
		array_shift( $sces );


/////////////////////////////////////
		//$appsJson = $this->getJson( 1 );

		//$newDoss = 'ooo';
		//
		//$newSce         = new \stdClass();
		//$newSce->name   = 'ooo';
		//$newSce->chemin = './ooo';
		//var_dump( array_search( $newSce, $appsJson ) );
		//$json->apps[]   = $newSce;
		//var_dump( $appsJson, $newDoss );

////////////////////////////////
		$folds=[];
		foreach ( $sces as $s ) {
			if ( is_dir( '../' . $s . '/' ) ) {
				$folds[] = $this->getAnyDoss( $s );
			}
		}

		return $folds;
	}
	
	
	public function newDossier ( $newDoss ) {

		// Création du dossier
		include 'assets/helpers/functions/recursiveCopy.php';

		$source      = './../Gc7Ga/assets/helpers/folderTemplate';
		$destination = './../' . $newDoss;

		//var_dump($this->getFolders('./'));

		//recursiveCopy( $source, $destination );

		// Ajout dans le Json
		$json = $this->getJson();

		$newSce         = new \stdClass();
		$newSce->name   = $newDoss;
		$newSce->chemin = './' . $newDoss;

		//var_dump( $json, $newDoss );

		if ( ! array_search( $newSce, $json->apps ) ) {
			$json->apps[] = $newSce;
			$this->setJson();
		}
		else {
			$complMsg = '<em> Il a été réactivé ;-)</em>';
		}


		if ( recursiveCopy( $source, $destination ) ) {
			$coul = 'success';
			$msg  = 'Votre nouveau dossier <strong>' . ucfirst( $newDoss ) . '</strong> a été <strong>ajouté</strong> avec <strong>succès</strong>.';
		}
		else {
			$coul = 'danger';
			$msg  = 'Le dossier <strong>' . ucfirst( $newDoss ) . ' existe déjà</strong>.' . ( $complMsg ?? '' );

		}

		echo Notif::aff( $msg, $coul );

		return TRUE;
	}

	/**
	 * Fonction callback pour nettoyer liste des dossiers
	 * (Avec array_filter ci-après)
	 *
	 * @param $v
	 *
	 * @return string || void
	 */
	private function nettAnySce ( $v ) {
		return ( $v[ 0 ] !== '.' && is_dir( $this->chemin . $v ) );
	}

	public function getAnyDoss ( $dir = null ) {
		//var_dump( $dir );

		//echo '<h1>ISDIR</h1>';
		$sce      = new \stdClass();
		$sce->nom = $dir;
		$dir      = '/' . $dir . '/';

		$this->chemin = dirname( __FILE__, 2 ) . $dir;

		$sce->menu = array_filter( scandir( dirname( __FILE__, 2 ) . $dir ), [ $this, 'nettAnySce' ] );

		$sce->nb = count( $sce->menu );

		return $sce;
	}
	
	private function verifCoherence ( $sces ) {

		$ctrlSces = $sces;
		array_shift( $ctrlSces );

		$folders = $this->getFolders();
		//var_dump( $folders );

		$i = array_search( 'blog', $folders );
		unset( $folders[ $i ] );
		$i = array_search( 'divers', $folders );
		unset( $folders[ $i ] );

		//array_shift( $folders );
		//array_shift( $folders );


		//var_dump( $folders );

		$diffs = array_diff( $ctrlSces, $folders );

		//var_dump( [ [ ' Apps ( <= Json ) ', $ctrlSces ], [ ' Folders (Réels) ', $folders ], [ $diffs ] ] );

		//var_dump( $diffs );

		/**
		 * Il existe un enregistrement ds le fichier json qui n'a pas (ou plus) son dossier
		 * => On enlève celui-ci
		 */
		if ( $diffs ) {
			array_splice( $this->json->apps, array_search( $diffs[ 0 ], $this->getApps() ), 1 );
			//var_dump($this->json);
			$this->setJson();
			$this->cookie = 'opo';$this->setCookie(0);
			echo Notif::aff( 'Un enregistrement (<b>' . ucfirst( $diffs[ 0 ] ) . '</b>) était superflu dans votre fichier json...<br>
Ce dernier été <b>"nettoyé"</b> :-) !', 'primary' );
			var_dump( $this->getCookie() );
			exit;
		}
	}
}
