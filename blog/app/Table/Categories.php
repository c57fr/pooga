<?php namespace Gc7\Blog\Table;

use Gc7\Blog\App;
use URLify;


class Categories extends Table {

	public function getUrl()
	{
		//return 'categorie/' . URLify::filter( $this->categorie );
		return '?p=categorie&id=' . $this->id;
	}

}
