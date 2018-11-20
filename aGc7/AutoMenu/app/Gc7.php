<?php namespace AutoMenu;

//todoli Compare version à celle du packagist (1 fois par semaine)

// todoli Add logo gc7 en haut à droite
// todoli Implanter procédure de vérification de la validité de json (lors des opé d'écritures) // dossiers => notif si besoin
// TODO Envisager une sorte de whiteliste de dossiers qui ne correspondraient pas à un service

class Gc7 {

	const GC7_COOKIE = 'Gc7AppEnCours';
	const GC7_JSON   = __DIR__ . '/choixApp.json';


	public $c;

	public static $pageService = 'Base';
	public static $appTitle    = 'AutoMenu';

	protected $json, $apps, $cookie, $file, $name;

	//private static $_appEnCours;
	//
	//public static function getInstance () {
	//	if ( ! self::$_appEnCours ) {
	//		self::$_appEnCours = new Gc7();
	//	}
	//
	//	return self::$_appEnCours;
	//}

	protected function __construct () {
	}

	public function start () {
		//unset( $_GET[ 'c' ] );
		//unset( $_COOKIE[ 'Gc7AppEnCours' ] );

		//var_dump( self::GC7_JSON );

		//$this->apps = $this->recJson();
		//setcookie( self::NOM_COOKIE, $this->apps[ 0 ]->chemin, time() + 10 ** 7 );

		//$this->c      = $this->getChangement();
		//var_dump( [ 'c', $this->c ], [ 'cookie', $this->cookie ] , [ 'json', $this->json ] );

		//var_dump( $_GET );

		// Si 1 Chgt demandé... → Le gérer !
		if ( $this->getChange() ) {

			if ( $this->c !== 'admin' ) {
				//echo 'c demandé (Autre que admin)';

				// réc json
				$this->json = $this->getJson();
				//var_dump( $this->json );

				$this->apps = $this->getApps();
				//var_dump( $this->apps );

				// L'app demandée est explicitement nommée dans 'c' et existe
				$newId = array_search( $this->c, $this->apps->chemins );
				//var_dump( $newId, gettype( $newId ) );
				if ( is_int( $newId ) ) {
					$this->file = $this->json->apps[ $newId ]->chemin;
					$this->setCookie( $newId );
					$this->json->activeApp = $newId;
					$this->setJson();
				}
				else {
					// L'app demandée n'est pas explicitement demandée ou ne correspoind à rien
					// Dans ce cas, on prends l'app suivante (Si elle existe)
					// echo '<h2>"' . $this->c . '" demandé (App Indéfinie → (Si &exist;) Suivante !)</h2>';
					$nbApps = count( $this->json->apps );
					//var_dump( $nbApps );

					if ( $nbApps ) {

						$newAppId = ( $this->json->activeApp + 1 ) % $nbApps;

						$this->file = $this->json->apps[ $newAppId ]->chemin;
						//var_dump( $this->file );

						// Écriture cookie
						$this->setCookie( $newAppId );


						// Écriture du Json
						$this->json->activeApp = $newAppId;
						$this->setJson();
					}
					else {
						$_GET[ 'c' ] = $_GET[ 'p' ] = '';
						$this->file  = './';
					}

					/*
											var_dump( [
																'c'              => $this->c,
																'apps'           => $this->apps,
																'ActiveApp'      => $newAppId,
																'newAppId'       => $newAppId,
																'cookie'         => $this->cookie,
																'Json activeApp' => $this->json->activeApp,
																'Json apps'      => $this->json->apps
															] );
					*/

				}
			}
			else {
				unset( $this->file );
				header( 'Location: ./Gc7Ga/adminGc7.php' );
			}
		}
		// S'il existe, utiliser le cookie
		elseif ( $this->getCookie() ) {
			// réc cookie dans $this->file;
			$this->file = $this->cookie;
		}
		else { // Créer cookie
			//echo 'Écrit le cookie';
			// Réc json
			$this->json = $this->getJson();
			//var_dump( $this->json );
			// Écriture cookie
			//var_dump( $this->json->apps[ 0 ]->chemin );
			$this->setCookie( 0 );


			$this->file = $this->json->apps[ 0 ]->chemin;
			//$_GET[ 'p' ] = 'home';
		}
		if ( isset( $this->file ) && is_file( $_SERVER[ 'DOCUMENT_ROOT' ] . '/' . $this->file . '/index.php' ) ) {
			//var_dump( [ 'chemin', $this->file ] );
			//require './' . "$this->file" . '/index.php';
			require './' . "$this->file" . '/index.php';
		}
		else {
			die( '<h1>Err 404 : Page Not Found !</h1>
<p><em><a href="/aGc7/AutoMenu/adminAM.php">Cliquez ici pour résoudre ce lien en vérifiant la cohérence entre vos
dossiers et votre fichier Json</a></em></p>' );
		}
	}

	public function getCookie () {
		$this->cookie = $_COOKIE[ $this::GC7_COOKIE ] ?? null;

		return $this->cookie;
	}

	public function setCookie ( $appId = 0 ) {
		//var_dump( [ $appId, $this->json->apps ] );
		// todoli qd json vide la premiere fois → déclarer app principale  + chemin
		$this->cookie = $this->json->apps[ $appId ]->chemin;
		setcookie( self::GC7_COOKIE, $this->cookie, time() + 10 ** 7 );
	}

	public function getChange () {
		$this->c = $_GET[ 'c' ] ?? null;

		return $this->c;
	}

	public function getJson ( $sansActiveApp = FALSE ) {
		if ( ! $this->json ) {
			//var_dump( self::GC7_JSON );
			$this->json = json_decode( file_get_contents( self::GC7_JSON ) );
		}

		//var_dump( $sansActiveApp ? $this->json->apps : $this->json );

		return $sansActiveApp ? $this->json->apps : $this->json;
	}
	
	protected function setJson () {
		//var_dump($this::GC7_JSON);
		// todoli Vérifier pas de doublon avant l'appel (Tous les appels... Donc p-ê function)
		file_put_contents( $this::GC7_JSON, json_encode( $this->json, JSON_UNESCAPED_SLASHES ) );
	}

	public function getApps () {
		if ( ! isset( $this->apps ) ) {
			$this->json->apps ?? $this->getJson( 1 );
			//var_dump( $this->json->apps );
			$this->apps = $apps = new \stdClass();
			foreach ( $this->json->apps as $app ) {
				$apps->noms[]    = $app->nom;
				$apps->chemins[] = $app->chemin;
			}
			//var_dump( $this->apps);
			$this->apps->noms    = $apps->noms;
			$this->apps->chemins = $apps->chemins;
		}

		return $this->apps;
	}

	protected function getPath () {
		return '';
		//return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '' : './Gc7Ga/';
	}

	protected function getPathUp () {
		return '';
		//return strpos( $_SERVER[ 'REQUEST_URI' ], 'Gc7Ga' ) ? '../' : '';
	}
	
	public function getAppPrincipale () {
		return $this->json->apps[ 0 ];
	}

	protected function dbg ( ...$var ) {

		$dbt = debug_backtrace();

		$file         = explode( '\\', $dbt[ 1 ][ 'file' ] );
		$fichier      = explode( '.', end( $file ) );
		$fichier[ 0 ] = '<b><span style="color:blue;">' . $fichier[ 0 ] . '</span></b>';
		$fichier      = implode( '.', $fichier );
		$file         = implode( '\\', array_slice( $file, - 3, 2 ) ) . '\\' . $fichier;

		echo '<pre>  <b>' . $dbt[ 1 ][ 'function' ] . '  [' . get_called_class() . ']</b>  ( ' . $file . ' : <span style="color:red;
"><b>' . $dbt[ 0 ][ 'line' ]
		     . '</b></span> )';

		if ( $var ) {
			var_dump( $var );
		}
		else {
			var_dump( [
				          '$_GET'          => $_GET ?: null,
				          '$_COOKIE'       => $_COOKIE[ self::GC7_COOKIE ] ?? null,
				          'apps'           => $this->apps ?? 'Indéfini',
				          'Json apps'      => $this->getJson()->apps,
				          'Json activeApp' => $this->getJson()->activeApp,
				          '$this->file'    => $this->file
			          ] );
		}
		echo '</pre>';
	}
	
}
