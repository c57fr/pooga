<?php namespace AutoMenu;

use Gc7\Helper\Notif;

class Admin extends Gc7 {

	public $msg;

	protected $folders, $new;
	private static      $_adminInstance;

	public static function getInstance () {
		if ( ! self::$_adminInstance ) {
			self::$_adminInstance = new Admin;

			//var_dump( 'iniInstance', self::$_adminInstance );
		}

		//echo $_SERVER['REQUEST_URI'];
		return self::$_adminInstance;
	}

	public function __construct () {
		parent::__construct();
	}

	public function __destruct () {
		$dbg = function () {
			$this->dbg();
		};
		// À activer pour débugage
		//$dbg();
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
		$protectedFolders = [ 'aGc7', 'node_modules', 'vendor', 'version_ini', 'aze' ];

		return ( $v[ 0 ] !== '.' && is_dir( $dir . $v ) && ! in_array( $v, $protectedFolders ) );
	}

	public function getFolders ( $dir = null ) {
		$res = 789;
		//$this->pathUp = $this->getPathUp();
		//$res          = array_filter( scandir( $dir ), [ $this, 'nett' ] );
//var_dump(dirname( __FILE__,4 ));
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

		$sces = $this->getJson()->apps;
		array_shift( $sces );
		//var_dump( sort( $sces ) );

		$folds = [ ];
		foreach ( $sces as $s ) {
			if ( is_dir( $_SERVER[ 'DOCUMENT_ROOT' ] . '/' . $s->chemin . '/' ) ) {
				//var_dump( $s->chemin );
				$folds[] = $this->getAnyDoss( $s );
			}
		}

		//var_dump( [ 'Folds', $folds ] );


		return $folds;
	}

	public function newDossier ( $newDoss ) {

		$faitDossier = function ( $newDoss ) {
			$source      = $_SERVER[ 'DOCUMENT_ROOT' ] . '/aGc7/AutoMenu/parts/helpers/folderTemplate';
			$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . '/' . $newDoss;

			//return 0; // Simu dossier existe déjà
			//return 10; // Simu dossier créé
			return recursiveCopy( $source, $destination ) * 10;
		};

		$ecritJson = function ( $newSce ) {

			//$json = $this->getJson();
			$this->getApps();
			//var_dump( $newSce, $this->apps->noms );

			if ( ! in_array( $newSce, $this->apps->noms ) ) {

				$newService         = new \stdClass();
				$newService->chemin = $newService->nom = $newSce;
				//var_dump( $this->json );
				$this->json->apps[] = $newService;
				//var_dump( $newService, $this->apps );
				//$this->json->apps = $this->apps;
				//var_dump( $this->json );
				$this->setJson();

				return 1;
			}
			else {
				$complMsg = '<em> Il a été réactivé ;-)</em>';

				return 0;
			}

		};

		$res = $faitDossier( $newDoss ) + $ecritJson( $newDoss );

		// Résultat AB:
		// - A: 0 || 1 : Création du dossier
		// - B: 0 || 1 : Écriture du Json
		//echo '<h1>Code retour = ' . $res . '</h1>';

		if ( $res === 11 ) {
			$couleur = 'success';
			$msg     = 'Votre nouveau dossier <strong>' . ucfirst( $newDoss ) . '</strong> a été <strong>ajouté</strong> avec <strong>succès</strong>.';
		}
		elseif ( $res === 1 ) {
			$couleur = 'info';
			$msg     = 'Le service <strong>' . ucfirst( $newDoss ) . '</strong> avait déjà été créé. Il est maintenant <strong>réactivé</strong>.';
		}
		else {
			$couleur = 'danger';
			$msg     = 'Le Service <strong>' . ucfirst( $newDoss ) . ' existe déjà</strong>.';

		}

		echo Notif::aff( $msg, $couleur );

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
		//var_dump( [ $this->cheminCompl . '/' . $v, is_dir( $this->cheminCompl . '/' . $v . '/' ) ] );

		return ( $v[ 0 ] !== '.' && is_dir( $this->cheminCompl . '/' . $v ) );
	}

	public function getAnyDoss ( $s ) {
		//var_dump( $dir, $this->json->apps );

		//echo '<h1>ISDIR</h1>';
		$sce               = new \stdClass();
		$sce->nom          = $s->nom;
		$sce->chemin       = $s->chemin;
		$this->cheminCompl = $_SERVER[ 'DOCUMENT_ROOT' ] . '/' . $s->chemin . '/';

		$sce->menu = array_filter( scandir( $this->cheminCompl ), [ $this, 'nettAnySce' ] );

		//var_dump( $this->cheminCompl );


		$sce->nb = count( $sce->menu );

		//var_dump( $sce );

		return $sce;
	}
	
	public function getCoherence () {
		return $this->verifCoherence();
	}

	private function verifCoherence () {

		$this->getApps();
		$chemSces = $this->apps->chemins;

		$dossiersExistants = array_filter( $chemSces, function ( $v ) {
			return ( is_dir( $_SERVER[ 'DOCUMENT_ROOT' ] . '/' . $v ) );
		} );

		$aEffacers = array_diff( $chemSces, $dossiersExistants );

		if ( $aEffacers ) {

			$indexDu0 = array_search( array_values( $aEffacers )[ 0 ], $chemSces );

			$msg = Notif::aff( 'Un enregistrement (<b>' . ucfirst( $aEffacers[ $indexDu0 ] ) . '</b>) était superflu dans votre fichier json...<br>
Ce dernier été <b>"nettoyé"</b> :-) !', 'primary' );

			//$this->dbg( $indexDu0 );

			//var_dump( $this->json, is_array( $this->json->apps ) );


			//unset( $this->json->apps[ $indexDu0 ] );
			array_splice( $this->json->apps, $indexDu0, 1, null );

			$this->json->activeApp = 0;
			$this->setJson();

			//var_dump( $this->json, $this->json->apps );

			/*
						$this->dbg( [ 'apps' => $chemSces ], [
							'Doss Existant'    => $dossiersExistants,
							'À effacer'        => $aEffacers,
							'Index du premier' => $indexDu0
						] );
			*/

			//var_dump( $this->setCookie() );
			return $msg;
		}
		//array_filter($chemins,[$this, $test()]);
		//$folders=123;
		//
		//
		//$this->dbg( $folders, $chemins );

		//
		//$i = array_search( 'blog', $folders );
		//unset( $folders[ $i ] );
		//$i = array_search( 'divers', $folders );
		//unset( $folders[ $i ] );

		//array_shift( $folders );
		//array_shift( $folders );


		//var_dump( $folders );

		//$diffs = array_diff( $ctrlSces, $folders );

		//var_dump( [ [ ' Apps ( <= Json ) ', $ctrlSces ], [ ' Folders (Réels) ', $folders ], [ $diffs ] ] );

		//var_dump( $diffs );

		/**
		 * Il existe un enregistrement ds le fichier json qui n'a pas (ou plus) son dossier
		 * => On enlève celui-ci
		 */
		if ( 0 && $diffs ) {
			array_splice( $this->json->apps, array_search( $diffs[ 0 ], $this->getApps() ), 1 );
			//var_dump($this->json);
			//$this->setJson(); //////////////////////
			$this->cookie = 'opo';
			//$this->setCookie( 0 ); /////////////////
			echo Notif::aff( 'Un enregistrement (<b>' . ucfirst( $diffs[ 0 ] ) . '</b>) était superflu dans votre fichier json...<br>
Ce dernier été <b>"nettoyé"</b> :-) !', 'primary' );
			var_dump( $this->getCookie() );
			//exit;
		}
	}
	
	

}
