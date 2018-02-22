<?php namespace Gc7Ga;


class Gc7 {

	const GC7_COOKIE = 'Gc7AppEnCours';
	const GC7_JSON   = 'choixApp.json';

	public $appActuelle, $appALancer, $c, $cookie, $file;

	public static $pageTitle = 'POOGA';

	protected $apps, $json;

	private static $_appEnCours;


	/**
	 * Gc7 constructor.
	 *
	 * @param $c
	 */
	protected function __construct () {
		//$this->gereChange();
	}


	public static function getInstance () {
		if ( ! self::$_appEnCours ) {
			self::$_appEnCours = new Gc7();
		}

		return self::$_appEnCours;
	}


	public function gereChange () {
		//unset( $_GET[ 'c' ] );
		//unset( $_COOKIE[ 'Gc7AppEnCours' ] );


		//$this->apps = $this->recJson();
		//setcookie( self::NOM_COOKIE, $this->apps[ 0 ]->chemin, time() + 10 ** 7 );


		$this->c      = $this->getChangement();
		$this->cookie = $this->getCookie();

		if ( $this->c ) { // Chgt demandé... À gérer

			if ( $this->c == 'admin' ) {
				unset( $this->file );
			}
			else {


				// réc json
				$this->apps = $this->getJson( TRUE );

				// No re-écrire cookie pour F5 change au début

				// re-écrire json

				// réc url -> $this->file;


				if ( in_array( $this->c, $this->apps->apps ) ) {
					// L'app demandée est explicitement nommée dans c
					echo '<h1>App ' . $this->c . ' demandé</h1>';
				}
				else {
					// L'app demandée n'est pas explicitement demandée ou ne correspoind à rien
					// Dans ce cas, on prends l'app suivante
					//echo '<h1>App ' . $this->c . ' demandé (N\'existe pas)</h1>';
					$nbApps   = count( $this->apps->apps );
					$newAppId = ( $this->apps->activeApp + 1 ) % $nbApps;

					$newApp     = $this->apps->apps[ $newAppId ]->chemin;
					$this->file = $newApp;


					// Écriture cookie
					$this->setCookie( $newAppId );
					$this->apps->activeApp = $newAppId;

					// Écriture du Json
					file_put_contents( './Gc7Ga/choixApp.json', json_encode( $this->apps, JSON_UNESCAPED_SLASHES ) );


					//var_dump( [ 'c' => $this->c, 'apps' => $this->apps->apps, 'ActiveApp' => $this->apps->activeApp ] );


				}
			}


		}
		elseif ( $this->cookie ) { // Utiliser cookie

			// réc cookie dans $this->file;
			$this->file = $this->cookie;
		}
		else { // Créer cookie

			// Réc json
			$this->apps = $this->getJson();

			// Écriture cookie
			setcookie( self::GC7_COOKIE, $this->apps[ 0 ]->chemin, time() + 10 ** 7 );

			$this->file  = $this->apps[ 0 ]->chemin;
			$_GET[ 'p' ] = 'home';
		}

		//$this->appALancer = $this->appActuelle = $this->file;
		if ( isset( $this->file ) ) {
			require "$this->file";

		}
		else {

			header( 'Location: ./Gc7Ga/adminGc7.php' );
			//require 'Admin.php';
			$admin = Admin::getInstance();
			//Admin::getInstance();
		}
	}


	public function getCookie () {
		return $_COOKIE[ 'Gc7AppEnCours' ] ?? null;
	}

	public function setCookie ( $appId = 0 ) {
		$cookie       = $this->apps->apps[ $appId ]->chemin;
		$this->cookie = $cookie;
		setcookie( self::GC7_COOKIE, $cookie, time() + 10 ** 7 );
	}

	public function getChangement () {
		return $_GET[ 'c' ] ?? null;
	}
	
	
	public function getJson ( $avecActiveApp = FALSE ) {
		$choixApp = json_decode( file_get_contents( $this->getPath() . self::GC7_JSON ) );

		$choixApp = $avecActiveApp ? $choixApp : $choixApp->apps;

		return $choixApp;
	}


	public function uuu () { // todoli À suppr à la fin
		unset( $_GET[ 'c' ] );
		$c = $_GET[ 'c' ] ?? 'blog';

		var_dump( [ '$_GET [ \'c\' ]', $_GET [ 'c' ] ], [ 'c', $c ], [ 'Cookie', $_COOKIE ] );
	}
	
	public function getAppsName () {

		$this->oApps = $this->getJson();
		$apps        = [ ];
		foreach ( $this->oApps as $app ) {
			//echo $app->name;
			$apps[] = $app->name;
		}

		//var_dump( $apps );

		return $apps;
	}

	protected function getPath () {

		return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '' : './Gc7Ga/';
	}

	protected function getPathUp () {

		return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '../' : '';
	}
}
