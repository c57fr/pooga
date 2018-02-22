<?php namespace Gc7Ga;


class Gc7 {

	const GC7_COOKIE = 'Gc7AppEnCours';
	const GC7_JSON   = 'choixApp.json';

	public $c;

	public static $pageTitle = 'POOGA';

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


		if ( $this->getChange() ) { // Chgt demandé... À gérer !

			if ( $this->c !== 'admin' ) {

				// réc json
				$this->json = $this->getJson();
				//var_dump( $this->json );

				$this->apps = $this->getApps();
				//var_dump( $this->apps );

				// No re-écrire cookie pour F5 change au début

				// re-écrire json

				// réc url -> $this->file;


				if ( in_array( $this->c, $this->apps ) ) {
					// L'app demandée est explicitement nommée dans c
					echo '<h1>App ' . $this->c . ' demandée explicitement</h1>';
				}
				else {
					// L'app demandée n'est pas explicitement demandée ou ne correspoind à rien
					// Dans ce cas, on prends l'app suivante
					//echo '<h2>' . $this->c . ' demandé (App Indéfinie => Suivante !)</h2>';
					$nbApps   = count( $this->apps );
					$newAppId = ( $this->json->activeApp + 1 ) % $nbApps;

					$this->file = $this->json->apps[ $newAppId ]->chemin;
					//var_dump( $this->file );

					// Écriture cookie
					$this->setCookie( $newAppId );
					$this->json->activeApp = $newAppId;

					// Écriture du Json
					file_put_contents( './Gc7Ga/' . $this::GC7_JSON, json_encode( $this->json, JSON_UNESCAPED_SLASHES ) );


					//var_dump( [ 'c' => $this->c, 'apps' => $this->apps[$newAppId], 'ActiveApp' => $newAppId );


				}
			}
			else {
				unset( $this->file );
				header( 'Location: ./Gc7Ga/adminGc7.php' );
			}
		}
		elseif ( $this->getCookie() ) { // Utiliser cookie

			// réc cookie dans $this->file;
			$this->file = $this->cookie;
		}
		else { // Créer cookie

			// Réc json
			$this->apps = $this->getJson();

			// Écriture cookie
			$this->setCookie( $this->apps[ 0 ]->chemin );

			$this->file  = $this->apps[ 0 ]->chemin;
			$_GET[ 'p' ] = 'home';
		}

		//$this->appALancer = $this->appActuelle = $this->file;
		if ( isset( $this->file ) ) {
			require "$this->file";
		}
		else {
			die( '<h1>Err 404 : Page Not Found !</h1>' );
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


	public function uuu () { // todoli À suppr à la fin
		unset( $_GET[ 'c' ] );
		$c = $_GET[ 'c' ] ?? 'blog';

		var_dump( [ '$_GET [ \'c\' ]', $_GET [ 'c' ] ], [ 'c', $c ], [ 'Cookie', $_COOKIE ] );
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
