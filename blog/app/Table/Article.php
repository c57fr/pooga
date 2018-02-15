<?php namespace Gc7\Blog\Table;

use URLify;


class Article {
	
	public function __get( $key )
	{
		$method     = 'get' . ucfirst( $key );
		$this->$key = $this->$method();

		return $this->$key;
	}

	public function getUrl()
	{
		//return 'article/'.URLify::filter( $this->titre );
		return '?p=article&id=' . $this->id;
	}

	public function getExtrait()
	{
		return substr( $this->contenu, 0, 79 ) . '... <i><a href="' . $this->getURL() . '"><br>Lire plus</a></i>';
	}

}
