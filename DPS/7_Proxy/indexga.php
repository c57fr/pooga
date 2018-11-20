<h1 style="margin-top: 30px">Middleware</h1><?php
//require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;


$request  = ServerRequest::fromGlobals();
$response = new Response();

$urlo = $request->getUri();
$url = $request->getUri()->getQuery();

var_dump( $urlo );
//echo $url.'<hr>';


if ( $url === 'p=7_Proxy&pg=indexga.php' ) {
	echo '<h1>AAACCUEIL Middleware</h1>';
	$response->getBody()->write( 'Accueil' );
}
elseif ( $url === 'p=7_Proxy&pg=indexga.php/8' ) {
	echo '<h1>AAACCUEIL ooo</h1>';
	$response->getBody()->write( 'Accueil' );
}
else {
	$response->getBody()->write( 'Not found' );
	$response = $response->withStatus( 404 );
}

use function Http\Response\send;

send( $response );
