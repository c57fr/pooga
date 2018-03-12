<h1 style="margin-top: 30px">Middleware</h1><?php
//require dirname( __DIR__ ) . '/autoloader.php';
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\ServerRequest;

require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

$request  = ServerRequest::fromGlobals();
$response = new Response();

$url = $request->getUri();


var_dump( $url );
echo $url;


if ( $url == '/?p=7%20Proxy&pg=indexga.php' ) {
	$response->getBody()->write( 'Accueil' );
}
else {
	$response->getBody()->write( 'Not found' );
	$response = $response->withStatus( 404 );
}
