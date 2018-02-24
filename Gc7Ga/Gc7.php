<?php namespace Gc7Ga;

// todoli Add logo gc7 en haut à droite
// todoli Implanter procédure de vérification de la validité de json (lors des opé d'écritures) // dossiers => notif si besoin
// TODO Envisager une sorte de whiteliste de dossiers qui ne correspondraient pas à un service

class Gc7 {

	const GC7_COOKIE = 'Gc7AppEnCours';
	const GC7_JSON   = 'choixApp.json';

	public $c;

	public static $pageService = 'Change';
	public static $appTitle    = 'POOGA';

	protected $json, $apps, $cookie, $file;

	private static $_appEnCours;

	public static function getInstance () {
		if ( ! self::$_appEnCours ) {
			self::$_appEnCours = new Gc7();
		}

		return self::$_appEnCours;
	}

	protected function __construct () {
	}

	public function gereChange () {
		//unset( $_GET[ 'c' ] );
		//unset( $_COOKIE[ 'Gc7AppEnCours' ] );


		//$this->apps = $this->recJson();
		//setcookie( self::NOM_COOKIE, $this->apps[ 0 ]->chemin, time() + 10 ** 7 );

		//$this->c      = $this->getChangement();
		//var_dump( [ 'c', $this->c ], [ 'cookie', $this->cookie ] );

		//var_dump( $_GET );

		if ( $this->getChange() ) { // 1 Chgt demandé... À gérer !

			if ( $this->c !== 'admin' ) {
				//echo 'c demandé';

				// réc json
				$this->json = $this->getJson();
				//var_dump( $this->json );

				$this->apps = $this->getApps();
				//var_dump( $this->apps );

				// L'app demandée est explicitement nommée dans 'c' et existe
				if ( in_array( $this->c, $this->apps ) ) {
					$newId      = array_search( $this->c, $this->apps );
					$this->file = $this->json->apps[ array_search( $this->c, $this->apps ) ]->chemin;
					//var_dump($newId, $this->json->apps[ $newId ]->chemin);
					//$this->setCookie( $this->json->apps[ $newId ]->chemin );
					//unset($_GET['c']);
				}
				else {
					// L'app demandée n'est pas explicitement demandée ou ne correspoind à rien
					// Dans ce cas, on prends l'app suivante
					//echo '<h2>' . $this->c . ' demandé (App Indéfinie => Suivante !)</h2>';
					$nbApps = count( $this->apps );
					//var_dump( $this->json );
					$newAppId = ( $this->json->activeApp + 1 ) % $nbApps;
					//var_dump( $newAppId );

					$this->file = $this->json->apps[ $newAppId ]->chemin;
					//var_dump( $this->file );

					// Écriture cookie
					$this->setCookie( $newAppId );

					// Écriture du Json
					$this->json->activeApp = $newAppId;
					$this->setJson();


					//var_dump( [ 'c' => $this->c, 'apps' => $this->apps[$newAppId], 'ActiveApp' => $newAppId );

				}
			}
			else {
				unset( $this->file );
				header( 'Location: ./Gc7Ga/adminGc7.php' );
			}
		}
		elseif ( $this->getCookie() ) { // S'il existe, utiliser cookie
			// réc cookie dans $this->file;
			$this->file = $this->cookie;
		}
		else { // Créer cookie
			//echo 'ecrit cookie';
			// Réc json
			$this->apps = $this->getJson( 1 );
			//var_dump( $this->apps );
			// Écriture cookie
			//var_dump( $this->apps{0} );
			$this->setCookie( $this->apps[ 0 ]->chemin );


			$this->file = $this->apps[ 0 ]->chemin;
			unset( $_GET[ 'c' ] );
			$_GET[ 'p' ] = 'home';
		}

		if ( isset( $this->file ) && is_file( $this->file . '/index.php' ) ) {
			//var_dump( $this->file);
			require "$this->file" . '/index.php';
		}
		else {
			die( '<h1>Err 404 : Page Not Found
!</h1><p><em><a href="/Gc7Ga/adminGc7.php">Vérifier la cohérence entre vos dossiers et votre fichier json</a></em></p>' );
		}
	}

	public function getCookie () {
		$this->cookie = $_COOKIE[ $this::GC7_COOKIE ] ?? null;

		return $this->cookie;
	}

	public function setCookie ( $appId = 0 ) {
		$cookie       = $this->json->apps[ $appId ]->chemin;
		$this->cookie = $cookie;
		setcookie( self::GC7_COOKIE, $cookie, time() + 10 ** 7 );
	}

	public function getChange () {
		$this->c = $_GET[ 'c' ] ?? null;

		return $this->c;
	}

	public function getJson ( $sansActiveApp = FALSE ) {
		if ( ! $this->json ) {
			$this->json = json_decode( file_get_contents( $this->getPath() . self::GC7_JSON ) );
		}

		//var_dump( $this->json );

		return $sansActiveApp ? $this->json->apps : $this->json;
	}
	
	protected function setJson () {
		// todoli Vérifier pas de doublon avant l'appel (Tous les appels... Donc p-ê function)
		file_put_contents( __DIR__ . '/' . $this::GC7_JSON, json_encode( $this->json, JSON_UNESCAPED_SLASHES ) );
	}

	public function getApps () {
		if ( ! isset( $this->apps ) ) {
			$apps = [ ];
			$this->json->apps ?? $this->getJson( 1 );
			foreach ( $this->json->apps as $app ) {
				$apps[] = $app->name;
			}
			$this->apps = $apps;
		}

		return $this->apps;
	}

	protected function getPath () {

		return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '' : './Gc7Ga/';
	}

	protected function getPathUp () {

		return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '../' : '';
	}

	public static function toCamelCase ( $word ) {
		return lcfirst( str_replace( ' ', '', ucwords( strtr( $word, '_-', ' ' ) ) ) );
	}

}
