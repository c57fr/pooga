<?php namespace Gc7\Blog\Table;

use URLify;
use Gc7\Core\Table\Table;


class Categories extends Table {

	public function getUrl()
	{
		//return 'categorie/' . URLify::filter( $this->categorie );
		return '?p=categorie&id=' . $this->id;
	}

}
