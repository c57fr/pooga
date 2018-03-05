<?php namespace Core\Controller;


class Controller {

	protected $viewPath;
	protected $template;

	protected function render ( $view, $variables = [ ] ) {
		ob_start();
		extract( $variables );
		require( $view = $this->viewPath . str_replace( '.', '/', $view ) . '.php' );
		$content = ob_get_clean();
		require( $this->viewPath . 'templates/' . $this->template . '.php' );
	}

	protected function notFound () {
		header( "HTTP/1.0 404 Not Found" );
		die( 'Page introuvable !' );
		//header( 'Location:index.php?p=404' );
	}

	protected function forbiden () {
		header( "HTTP/1.0 403 Forbiden" );
		die( 'Accès interdit !' );
	}

}
